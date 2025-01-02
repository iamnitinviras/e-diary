<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\ContactUsRequest;
use App\Mail\ContactUsMail;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\CmsPage;
use App\Models\Comments;
use App\Models\ContactUs;
use App\Models\Notes;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class FrontController extends Controller
{
    public function index(){
        $search=trim(request()->search);
        $notes=Notes::with('category')
            ->where('status','published')
            ->when($search,function ($query) use ($search){
                if (isset($search) && $search!=null){
                    $query->where('title','like','%' . $search . '%')->orWhereLike('description', 'like','%' . $search . '%');
                }
            })
            ->orderBy('id','desc')
            ->paginate(config('app.per_page'));

        $total_notes=$notes->total()??0;

        if (request()->ajax()) {
            $view = view('theme.ajax', compact('notes','total_notes'))->render();
            return response()->json([
                'html' => $view,
            ]);
        }

        return view('theme.index',compact('notes','total_notes'));
    }

    public function details($slug){
        $blog=Blogs::where('slug',trim($slug))->first();
        if ($blog==null){
            return redirect('/');
        }
        $sidebarCategory=Category::where('id','!=',$blog->category_id)->orderBy(\DB::raw('RAND()'))->first();
        $sidebarBlogs=Blogs::with('category')
            ->where('category_id',$sidebarCategory->id??0)
            ->where('status','published')
            ->orderBy('id','desc')->limit(5)
            ->get();

        $blog->increment('total_views');
        return view('theme.details',compact('blog','sidebarCategory','sidebarBlogs'));
    }
    public function category($slug){
        $category=Category::where('slug',strtolower($slug))->first();
        if ($category==null){
            return redirect('/');
        }
        $notes=Blogs::with('category')
            ->where('category_id',$category->id)
            ->orderBy('id','desc')
            ->get();

        $sidebarCategory=Category::where('id','!=',$category->id)->orderBy(\DB::raw('RAND()'))->first();
        $sidebarBlogs=Blogs::with('category')
            ->where('status','published')
            ->where('category_id',$sidebarCategory->id??0)
            ->orderBy('id','desc')->limit(5)
            ->get();

        return view('theme.category',compact('notes','category','sidebarCategory','sidebarBlogs'));
    }
    public function search(Blogs $blog){
        return view('theme.search',compact('blog'));
    }
    public function allBlogs(Blogs $blog){
        $notes=Blogs::with('category')->where('status','published')->orderBy('id','desc')->get();
        return view('theme.all',compact('notes'));
    }

    public static function getCategoriesForFooter(){
        return Category::whereHas('notes')->select('id','category_name','slug')->limit(8)->orderBy('category_name','asc')->get();
    }

    public static function getMoreFromUsForFooter(){
        return Blogs::with('author')->where('status','published')->orderBy(\DB::raw('RAND()'))->limit(3)->get();
    }
    public function comment(CommentRequest $request,Blogs $blog){
        Comments::create([
            'blog_id'=>$blog->id,
            'name'=>$request->name,
            'email'=>$request->email,
            'comment'=>$request->comment,
        ]);
        return redirect()->back()->with('Success',trans('system.messages.comment_success'));
    }

    public function termsAndCondition()
    {
        $termsAndCondition = CmsPage::where('slug', 'terms-and-conditions')->first();
        return view('theme.terms_and_condition')->with('termsAndCondition', $termsAndCondition);
    }

    public function privacyPolicy()
    {
        $privacyPolicy = CmsPage::where('slug', 'privacy-policy')->first();
        return view('theme.privacy_policy')->with('privacyPolicy', $privacyPolicy);
    }

    public function contact_us(Request $request)
    {
        return view('theme.contact_us');
    }

    public function contactUs(ContactUsRequest $request)
    {
        ContactUs::create(['name' => $request->name, 'email' => $request->email, 'message' => $request->message]);

        $data = [];
        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['message'] = $request->message;

        $adminEmails = User::where('user_type', User::USER_TYPE_ADMIN)->pluck('email')->toArray();

        foreach ($adminEmails as $adminEmail) {
            Mail::send(new ContactUsMail($data, $adminEmail));
        }
        return redirect('/contact-us')->with('Success', trans('system.contact_us.success'));
    }
    public function defaultTheme(Request $request){
        $typeArray=array('dark','light');
        if (request()->type!=null && in_array(request()->type,$typeArray)){
            Cookie::queue('theme_type', request()->type, 24 * 60 * 60 * 365);
        }else{
            Cookie::queue('theme_type', 'light', 24 * 60 * 60 * 365);
        }
        return redirect()->back();
    }
}

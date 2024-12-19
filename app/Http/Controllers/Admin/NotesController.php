<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NotesRequest;
use App\Models\Blogs;
use App\Models\Category;
use App\Models\Comments;
use App\Models\Notes;
use App\Repositories\BlogRepository;
use App\Repositories\NewsRepository;
use App\Repositories\NotesRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show blogs')->only('index','show');
        $this->middleware('permission:add blogs')->only('create','store');
        $this->middleware('permission:edit blogs')->only('edit','update');
        $this->middleware('permission:delete blogs')->only('destroy');
    }
    public function index()
    {
        $request = request();
        $params = $request->only('par_page', 'sort', 'direction', 'filter');
        $blogs = (new NotesRepository())->getBlogs($params);
        return view('admin.blogs.index', ['blogs' => $blogs]);
    }
    public function create()
    {
        $categories=Category::where('status','active')->orderBy('category_name','asc')->get();
        return view('admin.blogs.create',compact('categories'));
    }

    public function store(No $request)
    {
        $user = auth()->user();
        try {
            DB::beginTransaction();
            $input = $request->only('title','description','slug','image','status','read_time','category_id','seo_keyword','seo_description','lang_title','lang_description');
            $input['created_by']=$user->id;
            Notes::create($input);
            DB::commit();
            $request->session()->flash('Success', __('system.messages.saved', ['model' => __('system.blogs.title')]));
        } catch (\Exception $ex) {
            DB::rollback();
            $request->session()->flash('Error',$ex->getMessage());
            return redirect()->back();
        }
        return redirect()->route('admin.blogs.index');
    }

    public function edit(Blogs $blog)
    {
        $categories=Category::where('status','active')->orderBy('category_name','asc')->get();
        return view('admin.blogs.edit', ['blog' => $blog,'categories'=>$categories]);
    }

    public function update(NotesRequest $request, Notes $blog)
    {
        $input = $request->only('title','description','image','status','slug','read_time','category_id','seo_keyword','seo_description','lang_title','lang_description');
        $blog->fill($input)->save();

        $request->session()->flash('Success', __('system.messages.updated', ['model' => __('system.blogs.title')]));
        if ($request->back) {
            return redirect($request->back);
        }
        return redirect(route('admin.blogs.index'));
    }

    public function destroy(Blogs $blog)
    {
        $request = request();
        $blog->delete();
        $request->session()->flash('Success', __('system.messages.deleted', ['model' => __('system.blogs.title')]));
        if ($request->back) {
            return redirect($request->back);
        }
        return redirect(route('admin.blogs.index'));
    }
}
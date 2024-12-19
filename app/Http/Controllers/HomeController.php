<?php

namespace App\Http\Controllers;

use App\Models\Blogs;
use App\Models\Category;
use App\Models\Comments;
use App\Models\ContactUs;
use App\Models\Notes;
use App\Models\User;
use Illuminate\Http\Request;
use Response;

class HomeController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    public function editorImageUpload(Request $request)
    {
        $imgpath = request()->file('file')->store('uploads', 'public');
        return Response::json(['location' => $imgpath]);
    }

    public function verifyEmail()
    {
        $user = auth()->user();
        if ($user->user_type !== User::USER_TYPE_VENDOR) {
            return redirect('home');
        }
        if ($user->email_verified_at != null) {
            return redirect('home');
        }
        return view('auth.verify', compact('user'));
    }

    public function index()
    {
        $user = auth()->user();
        $count['total_categories'] = Category::count();
        $count['total_notes'] = Notes::count();
        $count['total_contact_request'] = ContactUs::count();

        return view('home', $count);
    }

    public function getRightBarContent(Request $request)
    {
        $action = $request->action;
        $id = (int)$request->id;
        if ($action == 'contact-us') {
            $contact_data = ContactUs::find($id);
            return view('admin.contact_us.sidebar', compact('contact_data'))->render();
        }
    }
}

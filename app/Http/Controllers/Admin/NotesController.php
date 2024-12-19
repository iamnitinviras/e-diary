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
use Laravel\Prompts\Note;

class NotesController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show notes')->only('index','show');
        $this->middleware('permission:add notes')->only('create','store');
        $this->middleware('permission:edit notes')->only('edit','update');
        $this->middleware('permission:delete notes')->only('destroy');
    }
    public function index()
    {
        $request = request();
        $params = $request->only('par_page', 'sort', 'direction', 'filter');
        $notes = (new NotesRepository())->getBlogs($params);
        return view('admin.notes.index', ['notes' => $notes]);
    }
    public function create()
    {
        $categories=Category::where('status','active')->orderBy('category_name','asc')->get();
        return view('admin.notes.create',compact('categories'));
    }

    public function store(NotesRequest $request)
    {
        $user = auth()->user();
        try {
            DB::beginTransaction();
            $input = $request->only('title','description','status','category_id');
            $input['created_by']=$user->id;
            Notes::create($input);
            DB::commit();
            $request->session()->flash('Success', __('system.messages.saved', ['model' => __('system.notes.title')]));
        } catch (\Exception $ex) {
            DB::rollback();
            $request->session()->flash('Error',$ex->getMessage());
            return redirect()->back();
        }
        return redirect()->route('admin.notes.index');
    }

    public function edit(Notes $note)
    {
        $categories=Category::where('status','active')->orderBy('category_name','asc')->get();
        return view('admin.notes.edit', ['blog' => $note,'categories'=>$categories]);
    }

    public function update(NotesRequest $request, Notes $note)
    {
        $input = $request->only('title','description','status','category_id');
        $note->fill($input)->save();

        $request->session()->flash('Success', __('system.messages.updated', ['model' => __('system.notes.title')]));
        if ($request->back) {
            return redirect($request->back);
        }
        return redirect(route('admin.notes.index'));
    }

    public function destroy(Blogs $note)
    {
        $request = request();
        $note->delete();
        $request->session()->flash('Success', __('system.messages.deleted', ['model' => __('system.notes.title')]));
        if ($request->back) {
            return redirect($request->back);
        }
        return redirect(route('admin.notes.index'));
    }
}

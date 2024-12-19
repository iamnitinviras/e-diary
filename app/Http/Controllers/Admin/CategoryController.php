<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\File;
use Illuminate\Http\UploadedFile;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show categories')->only('index','show');
        $this->middleware('permission:add categories')->only('create','store');
        $this->middleware('permission:edit categories')->only('edit','update');
        $this->middleware('permission:delete categories')->only('destroy');
    }

    public function index()
    {
        $request = request();
        $user = auth()->user();
        $params = $request->only('par_page', 'sort', 'direction', 'filter');
        $categories = (new CategoryRepository())->getCategories($params);
        return view('admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        $user = auth()->user();
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {
        try {
            DB::beginTransaction();
            $input = $request->only('category_name', 'description','status');
            $input['sort_order'] = Category::max('sort_order') + 1;
            Category::create($input);
            DB::commit();
            $request->session()->flash('Success', __('system.messages.saved', ['model' => __('system.categories.title')]));
        } catch (\Exception $ex) {
            dd($ex->getMessage());
            DB::rollback();
            $request->session()->flash('Error', __('system.messages.operation_rejected'));
            return redirect()->back();
        }
        return redirect()->route('admin.categories.index');
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $input = $request->only('category_name', 'description','status');
        $category->fill($input)->save();

        $request->session()->flash('Success', __('system.messages.updated', ['model' => __('system.categories.title')]));
        if ($request->back) {
            return redirect($request->back);
        }
        return redirect(route('admin.categories.index'));
    }

    public function destroy(Category $category)
    {
        $request = request();
        $category->delete();
        $request->session()->flash('Success', __('system.messages.deleted', ['model' => __('system.categories.title')]));
        if ($request->back) {
            return redirect($request->back);
        }
        return redirect(route('admin.categories.index'));
    }

    public function positionChange()
    {
        $request = request();
        Category::where('id', $request->id)->update(['sort_order' => $request->index]);
        return true;
    }
}

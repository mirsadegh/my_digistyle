<?php

namespace App\Http\Controllers\Admin;


use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereNull('parent_id')->latest()->paginate(10);
        return view('admin.categories.all',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->parent_id){
            $request->validate([
               'parent_id'  => 'exists:categories,id',
            ]);
        }

        $request->validate([
            'name' => 'required|min:3|unique:categories,name'
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $request->parent_id ?? null,
        ]);
       
        alert()->success('دسته جدید با موفقیت ثبت گردید.');
        return redirect(route('admin.categories.index'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $categories = Category::whereNull('parent_id')->where('id','!=',$category->id)->get();
        return view('admin.categories.edit',compact('category','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
      
        if ($request->parent_id){
            $request->validate([
                'parent_id'  => 'exists:categories,id',
            ]);
        }
        $request->validate([
            'name' => ['required','min:3', Rule::unique('categories','name')->ignore($category->id)],
        ]);

        if (count($category->childs)   && $category->parent_id  != $request->parent_id){
            Session::flash('edit-category','این دسته بندی دارای زیر دسته میباشد. نمیتوان دسته والد را عوض کرد.');
            $category->update([
                'name' => $request->name,
            ]);
            return back();
        }elseif ($category->id == $request->parent_id ){
            Session::flash('edit-category','دسته والد انتخاب شده با دسته یکی میباشد.');
            return back();
        }else{
            $category->update([
                'name' => $request->name,
                'parent_id' => $request->parent_id ?? null,
            ]);
            alert()->success('باموفقیت دسته مورد نظر ویرایش گردید');
            return redirect(route('admin.categories.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if (count($category->childs)){
            Session::flash('error_category','این دسته بندی دارای زیر دسته است بنابراین نمیتوان حذف کرد.');
            return back();
        }
        $category->delete();
      
        alert()->success('دسته مورد نظر باموفقیت حذف گردید');
        return back();
    }

    
}

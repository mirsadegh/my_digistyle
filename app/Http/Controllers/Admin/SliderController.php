<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $images = Slider::paginate(10);
        return view('admin.sliders.all',compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.sliders.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'image' => 'required',
           'product_id' => 'required|exists:products,id'
        ]);
        Slider::create($request->all());
        alert()->success('عکس اسلایدر با موفقیت ذخیره گردید.');
        return redirect(route('admin.sliders.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
       
        $products = Product::all();
        return view('admin.sliders.edit',compact('slider','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'image' => 'required',
            'product_id' => 'required|exists:products,id'
         ]);
     
        $slider->update($request->all());
        alert()->success('عکس اسلایدر با موفقیت ویرایش گردید.');
        return redirect(route('admin.sliders.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();
        alert()->success('تصویر مورد نظر با موفقیت حذف گردید.');
        return back();
    }
}

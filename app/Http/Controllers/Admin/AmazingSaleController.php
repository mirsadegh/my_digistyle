<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Product;
use App\Models\AmazingSale;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AmazingSaleRequest;
use Illuminate\Validation\Rule;

class AmazingSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amazing_sales = AmazingSale::paginate(10);
        $products = Product::all();
        return view('admin.amazingSale.all', compact('amazing_sales','products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.amazingSale.create',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AmazingSaleRequest $request)
    {
        
        if($request->start_date >= $request->end_date){
            return back()->withErrors('تاریخ شروع بزرگتر از تاریخ اتمام است');
        }
        $inputs = $request->all();
        $start_date = substr($request->start_date,0,10);
        $inputs['start_date'] = date("Y-m-d H:i:s",(int)$start_date);
        $end_date = substr($request->end_date,0,10);
        $inputs['end_date'] = date("Y-m-d H:i:s",(int)$end_date);

        $amazing_sale = AmazingSale::create($inputs);

        alert()->success('محصول ویژه با موفقیت ثبت گردید.');
        return redirect()->route('admin.amazing_sales.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(AmazingSale $amazingSale)
    {
        $products = Product::all();
       return view('admin.amazingSale.edit',compact('amazingSale','products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AmazingSale $amazingSale)
    {
         $this->validate($request,[
            'product_id'     => ['required','exists:products,id', Rule::unique('amazing_sales')->ignore($amazingSale->id)],
            'percentage'     => 'required|numeric|between:0,100',
         ]);
        $inputs = $request->all();
        $start_date = substr($request->start_date,0,10);
        $inputs['start_date'] = date("Y-m-d H:i:s",(int)$start_date);
        $end_date = substr($request->end_date,0,10);
        $inputs['end_date'] = date("Y-m-d H:i:s",(int)$end_date);
        if($start_date == $end_date){
             $amazingSale->product_id = $request->product_id;
             $amazingSale->percentage = $request->percentage;
             $amazingSale->save();
             alert()->success('محصول ویژه با موفقیت ثبت گردید.');
             return redirect()->route('admin.amazing_sales.index');
        }

        if($request->start_date > $request->end_date){
            return back()->withErrors('تاریخ شروع بزرگتر از تاریخ اتمام است');
        }
        $amazing_sale = $amazingSale->update($inputs);

        alert()->success('محصول ویژه با موفقیت ثبت گردید.');
        return redirect()->route('admin.amazing_sales.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(AmazingSale $amazingSale)
    {
         $amazingSale->delete();
         alert()->success('با موفقیت حذف گردید.','بسیار خوب');
         return back();
    }
}

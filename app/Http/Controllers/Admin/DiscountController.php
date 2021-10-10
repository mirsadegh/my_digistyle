<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::latest()->paginate(10);
        return view('admin.discount.all',compact('discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validated = $request->validate([
            'code' => 'required|unique:discounts,code',
            'percent' => 'required|integer|between:1,99',
            'users' => 'nullable|array|exists:users,id',
            'products' => 'nullable|array|exists:products,id',
            'categories' => 'nullable|array|exists:categories,id',
            'expired_at' => 'required'
        ]);


       $discount = Discount::create($validated);


       if (isset($validated['users']))
       $discount->users()->attach($validated['users']);

        if (isset($validated['products']))
       $discount->products()->attach($validated['products']);
        if (isset($validated['categories']))
       $discount->categories()->attach($validated['categories']);

       return redirect(route('admin.discounts.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('admin.discount.edit',compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $validated = $request->validate([
            'code' => ['required' , Rule::unique('discounts','code')->ignore($discount->id)],
            'percent' => 'required|integer|between:1,99',
            'users' => 'nullable|array|exists:users,id',
            'products' => 'nullable|array|exists:products,id',
            'categories' => 'nullable|array|exists:categories,id',
            'expired_at' => 'required'
        ]);


         $discount->update($validated);


        isset($validated['users'])
          ?  $discount->users()->sync($validated['users']) : $discount->users()->detach();

        isset($validated['products'])
           ? $discount->products()->sync($validated['products']) :$discount->products()->detach() ;

        isset($validated['categories'])
           ? $discount->categories()->sync($validated['categories']) : $discount->categories()->detach();
        alert()->success('با موفقیت ویرایش گردید.','بسیار خوب');
        return redirect(route('admin.discounts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $discount->delete();
        $discount->users()->detach();
        $discount->categories()->detach();
        $discount->products()->detach();
        alert()->success('با موفقیت حذف گردید.','بسیار خوب');
        return back();
    }
}

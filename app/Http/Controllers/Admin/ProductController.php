<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $products = Product::query();

         if($keyword = request('search')){
             $products->where('name','LIKE',"%{$keyword}%")->orWhere('description','LIKE',"%{$keyword}%")->orWhere('id',$keyword);
         }

        $products = $products->latest()->paginate(4);
        return view('admin.products.all',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validDate =  $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "inventory" => "required",
            "discount_percent" => "required|numeric|between:0,99",
            "image" => "required",
            "categories" => "required",
            "attributes" => "array"
        ]);

        // $file =  $request->file('image');
        // $distinationPath = '/images/'. now()->year .'/'.  now()->month . '/' . now()->day.'/';
        // $file->move(public_path($distinationPath),$file->getClientOriginalName());

        // $validDate['image'] = $distinationPath.$file->getClientOriginalName();

        $product = Product::create($validDate);

        $product->categories()->sync($validDate['categories']);
        if (isset($validDate['attributes']))
        $this->attachAttributesToProduct($validDate['attributes'], $product);
        alert()->success('محصول جدید ایجاد گردید.');

        return redirect(route('admin.products.index'));

    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
//        return $product->attributes[0]->pivot->value_id;
//          return $product->attributes[0]->pivot->value;
        return view('admin.products.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validDate =  $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "inventory" => "required",
            "discount_percent" => "required|numeric|between:0,99",
            "image" => "required",
            "categories" => "required",
            "attributes" => "array",
        ]);

         $product->update($validDate);
         $product->categories()->sync($validDate['categories']);

          $product->attributes()->detach();
        if (isset($validDate['attributes']))
        $this->attachAttributesToProduct($validDate['attributes'], $product);

        alert()->success('محصول  مورد نظر با موفقیت ویرایش گردید.', 'باتشکر');

        return redirect(route('admin.products.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(File::exists(public_path($product->image))){
             File::delete(public_path($product->image));
        }

         $product->delete();
        alert()->success('محصول مورد نظر با موفقیت حذف گردید.');
        return redirect(route('admin.products.index'));
    }

    /**
     * @param $attributes1
     * @param Product $product
     */
    protected function attachAttributesToProduct($attributes1, Product $product): void
    {
        $attributes = collect($attributes1);
        $attributes->each(function ($item) use ($product) {
            if (is_null($item['name']) || is_null($item['value'])) return;

            $attr = Attribute::firstOrCreate(
                ['name' => $item['name']]
            );
            $attr_value = $attr->values()->firstOrCreate(
                ['value' => $item['value']]
            );

            $product->attributes()->attach($attr->id, ['value_id' => $attr_value->id]);

        });
    }
}

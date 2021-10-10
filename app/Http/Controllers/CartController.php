<?php

namespace App\Http\Controllers;


use App\Helpers\Cart\Cart;
use App\Models\Product;
use http\Env\Response;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class CartController extends Controller
{


    public function cart()
    {
            return view('Frontend.home.cart');
    }
    public function addToCart(Product $product)
    {

          if (Cart::has($product)){
                  if(Cart::count($product) < $product->inventory){
                      Cart::update($product,1);
                  };
          }else{
              Cart::put(['quantity' => 1],$product);
          }
            return redirect('/cart');
    }

    public function destroy($cartId)
    {
        Cart::delete($cartId);
        return back();

    }

    public function quantityChange(Request $request)
    {
           $data = $request->validate([
               'id' => 'required',
               'quantity' => 'required'
           ]);
            if (Cart::has($data['id'])){
                $key = Cart::get($data['id']);
                $product = Cart::withRelationshipIfExist($key)['product'];
                if ($product->inventory < $data['quantity']) return;

                Cart::update($data['id'],[
                     'quantity' => $data['quantity']
                ]);
                return response(['status' => 'success']);
            }
            return response(['status' => 'error'],404);
    }
}

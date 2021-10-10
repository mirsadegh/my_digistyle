<?php

namespace App\Helpers\Cart;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\True_;
use PhpParser\Node\Expr\AssignOp\Mod;

class CartService
{
       protected $cart;

       public function __construct()
       {
           $cart = session()->get('cart') ?? collect([]);
           $this->cart = $cart->count() ? $cart : collect([
               'items' => [],
               'discount' => null
           ]);
       }

    public function put(array $value, object $obj = null)
    {
        if ($obj){
            $value = array_merge($value,[
                'id' => Str::random(10),
                'subject_id' => $obj->id,
                'subject_type' => get_class($obj),
            ]);
        }

         $this->cart['items']= collect($this->cart['items'])->put($value['id'],$value);
         session()->put('cart',$this->cart);
         return $this;
    }

    public function update($product,$options)
    {
        $item = collect($this->get($product));
        if(is_numeric($options)){
            $item = $item->merge([
                'quantity' => $item['quantity'] + $options
            ]);
        }
        if (is_array($options)){
            $item = $item->merge($options);
        }
        $this->put($item->toArray());
        return $this;

    }

    public function count($key)
    {
        if(! $this->has($key)) return 0;
        return $this->get($key)['quantity'];
    }


    public function has($key)
    {
        if ($key instanceof Model){
            return ! is_null(
              collect($this->cart['items'])->where('subject_id',$key->id)->where('subject_type',get_class($key))->first()
            );
        }

      return ! is_null(
          collect($this->cart['items'])->firstWhere('id',$key)
      );
    }

    public function get($key)
    {
      if ($key instanceof Model){
          $item = collect($this->cart['items'])->where('subject_id',$key->id)->where('subject_type',get_class($key))->first();
      }else{
          $item = collect($this->cart['items'])->firstWhere('id',$key);
      }
      return $item;
    }

    public function delete($key)
    {
        if ($this->has($key)){
            $this->cart['items'] = collect($this->cart['items'])->filter(function ($item)use($key){
                 return $key != $item['id'];
            });
            session()->put('cart',$this->cart);
            return true;
        }
        return false;
    }

    public function all()
    {
        $cart =  $this->cart;
        $cart = collect($this->cart['items'])->map(function ($item)use($cart){
           return  $this->withRelationshipIfExist($item);

        });
        return $cart;
    }

    public function flush()
    {
        $this->cart = collect([]);
        session()->put('cart',$this->cart);
        return $this;
     }
    public function withRelationshipIfExist($item){
           if (isset($item['subject_id']) && isset($item['subject_type'])){
                  $class = $item['subject_type'];
                  $subject = (new $class())->find($item['subject_id']);
                  $item[strtolower(class_basename($class))] = $subject;
                  unset($item['subject_id']);
                  unset($item['subject_type']);
                  return $item;
           }
           return $item;
    }

    public function addDiscount($code)
    {
        $this->cart['discount'] = $code;
        session()->put('cart',$this->cart);
    }

    public function getDiscount()
    {
        return Discount::where('code',$this->cart['discount'])->first();
    }


}

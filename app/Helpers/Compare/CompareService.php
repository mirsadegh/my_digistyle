<?php

namespace App\Helpers\Compare;

use App\Models\Discount;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\True_;
use PhpParser\Node\Expr\AssignOp\Mod;

class CompareService
{
       protected $compare;

       public function __construct()
       {
           $compare = session()->get('compare') ?? collect([]);
           $this->compare = $compare->count() ? $compare : collect([]);

       }

    public function put(object $obj )
    {
        if ($obj){
            $value = [
                'id' => Str::random(10),
                'subject_id' => $obj->id,
                'subject_type' => get_class($obj),
            ];
        }

         $this->compare= collect($this->compare)->put($value['id'],$value);
         session()->put('compare',$this->compare);
         return $this;

    }

    public function hasNot($product)
    {

        return  is_null(
            collect($this->compare)->where('subject_id',$product->id)->first()
          );
    }

    public function findProduct()
    {
       $products =   $this->compare->map(function ($item){
             $class = $item['subject_type'];
            return ((new $class())->find($item['subject_id']));
       });
        return $products;

    }

    public function delete($product)
    {

        $this->compare = $this->compare->filter(function($item)use($product){
                return $item['subject_id'] != $product->id ;
        });
        session()->put('compare',$this->compare);
        return true;
    }









}

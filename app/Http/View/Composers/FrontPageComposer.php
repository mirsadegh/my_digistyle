<?php
namespace App\Http\View\Composers;

use App\Models\Category;
use Illuminate\View\View;



class FrontPageComposer
{
     private $frontCategories;
     public function __construct()
     {
          $this->frontCategories = Category::whereNull('parent_id')->with(['childs.childs' => function($query){
               $query->withCount('products');
           },'childs.products'])->get();
            foreach ($this->frontCategories as  $category) {
                foreach ($category->childs as $cate) {
                    $cate->products_count = $cate->childs->sum('products_count');
                }
                $category->products_count = $category->childs->sum('products_count');
            }
            return $this->frontCategories;
    
     }

     public function compose(View $view)
     {
         $view->with('frontCategories', $this->frontCategories);
     }
}
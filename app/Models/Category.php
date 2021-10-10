<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name','parent'];

    public function childs()
    {
        return $this->hasMany(Category::class,'parent','id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function parent($parent_id)
    {
        if ($parent_id == 0){
            return  '-';
        }
        $parent = Category::findOrFail($parent_id);
        return $parent->name;
    }
}

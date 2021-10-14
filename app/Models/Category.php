<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    use Sluggable;
    protected $fillable = ['name','parent_id','slug'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function childs()
    {
        return $this->hasMany(Category::class,'parent_id','id');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function parent($parent_id = null)
    {

        if ($parent_id == null){
            return  '-';
        }
        $parent = Category::findOrFail($parent_id);
      
        return $parent->name;
    }
}

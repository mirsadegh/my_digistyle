<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price' ,
        'inventory',
        'discount_percent',
        'image'
    ];

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->using(ProductAttributeValues::class)->withPivot('value_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}



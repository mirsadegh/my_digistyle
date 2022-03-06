<?php

namespace App\Models;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'description',
        'slug',
        'price' ,
        'inventory',
        'discount_percent',
        'category_id' ,
        'image',
        'brand_id'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class)->using(ProductAttributeValues::class)->withPivot('value_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    public function gallery()
    {
        return $this->hasMany(ProductGallery::class);
    }

    public function slider()
    {
        return $this->hasOne(Slider::class);
    }

    public function favorited()
    {
        return (bool) Favorite::where('user_id',Auth::id())->where('product_id',$this->id)->first();
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}



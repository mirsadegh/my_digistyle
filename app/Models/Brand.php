<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Brand extends Model
{
    use HasFactory,SoftDeletes,Sluggable;

    protected $fillable = ['persian_name','original_name','logo','status','tags'];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'persian_name'
            ]
        ];
    }
}

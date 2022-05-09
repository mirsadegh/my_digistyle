<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rating extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'product_id' , 'stars_rated'];

    public function users()
    {
         return $this->belongsTo(User::class);
    }
    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public function setRepeatRateAttribute()
    {
      $repeatRate =   $this->where('user_id',Auth::id())->first();
      return $repeatRate->stars_rated ? true : false;
    }


}

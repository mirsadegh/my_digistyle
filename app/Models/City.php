<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $fillable = ['province_id','name'];
    public $timestamps = false;

    public function provence()
    {
        return $this->belongsTo(Province::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

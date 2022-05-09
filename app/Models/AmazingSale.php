<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmazingSale extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','start_date','end_date','percentage'];
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

}

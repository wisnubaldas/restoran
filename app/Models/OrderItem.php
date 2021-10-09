<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $fillable = ['void'];
    public function product()
    {
        return $this->hasOne(Product::class,'id','products_id');
    }
}

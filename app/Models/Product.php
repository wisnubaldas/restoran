<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function product_category()
    {
        return $this->hasOne(ProductCategory::class,'id','product_category_id');
    }
    public function product_detail()
    {
        return $this->hasOne(ProductDetail::class,'id','product_detail_id');
        
    }
}
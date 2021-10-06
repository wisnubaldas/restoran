<?php
namespace App\Lib;
use App\Models\Product;
class Pesanan
{
    public $product;
    public function __construct() {
       $this->product = new Product;
    }
    public function get_category()
    {
        return $this->product->select('category')->get();
    }
    public function get_menu_by_category($category)
    {
        return $this->product->with(['product_detail','product_category'])->where('category',$category)->get();
    }
}
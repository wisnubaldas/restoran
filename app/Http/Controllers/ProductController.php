<?php

namespace App\Http\Controllers;

use App\Libs\LibTrait;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductDetail;

class ProductController extends Controller
{
    use LibTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $category =  $this->getCategory();
        return view('tambah_menu', compact('category'));
    }

    public function create_menu_makanan(Request $request)
    {
        return view('create-menu-makanan');
    }
    public function store(Request $request)
    {
        echo 1;
        dd($request);
        $products = new Product;
        $products->name = $request->name;
        $products->category = $request->kategori;
        $products->price = $request->harga;
        $products->discount = $request->discount;
        $products->desc = $request->deskripsi;
        // $products->product_detail->name_detail = $request->name_produk_detail;
        $products->save();

        $products_detail = new ProductDetail;
        $products_detail->id_product = $products->id;
        $products_detail->save();
        return back();
        // dd($request->all());
    }
}

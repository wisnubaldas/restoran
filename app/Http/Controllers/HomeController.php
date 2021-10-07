<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\LibTrait;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    use LibTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $category =  $this->getCategory();
        return view('home',compact('category'));
    }
    public function menu($category)
    {
        if($category == 'lihat-pesanan')
        {
            return $this->lihat_pesanan();
        }
        $menuMakanan = $this->getMenuByCategory($category);
        return view('menu-makanan',compact('menuMakanan'));
    }
    public function lihat_pesanan()
    {
        $mejas = $this->all_meja();
        return view('lihat-pesanan',compact('mejas'));
    }
    public function bayar(Request $request)
    {
        $this->orderan($request->data);
    }
}
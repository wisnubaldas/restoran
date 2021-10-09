<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libs\LibTrait;
use App\Models\Order;
use App\Models\OrderItem;

class KasirController extends Controller
{
    use LibTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = $this->proses_pesanan();
        return view('proses-pesanan',compact('orders'));
    }
    public function delete_pesanan($id)
    {
        $this->deletePesanan($id);
        return back();
    }
    public function bayarPesanan()
    {
        $bayar = $this->bayar_pesanan();
        return view('bayar-pesanan',compact('bayar'));
    }
    public function bayarCash($sn)
    {
        $o = Order::where('no_pesan',$sn)->first();
        $o->status = 'bayar';
        $o->save();
        return back();
    }
    public function pesananSelesai($id)
    {
        $oi = OrderItem::find($id);
        $oi->update(['void'=>1]);
        if(OrderItem::where('orders_id',$oi->orders_id)->where('void',0)->count() == 0)
        {
            Order::find($oi->orders_id)->update(['status'=>'selesai']);
        }

        return back();
    }
}

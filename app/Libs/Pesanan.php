<?php
namespace App\Libs;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Seri;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
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
    public static function set_orderan($data)
    {
        $seri = 'PSN'.Carbon::parse('now')->format('Ymd');
        $no_pesan = self::generate_no_order($seri);

        foreach ($data as $key => $value) {
            $o = new Order;
            $o->seris_id = $no_pesan->id;
            $o->no_pesan = $no_pesan->prefix.'-'.str_pad($no_pesan->id, 3, '0',STR_PAD_LEFT);
            $o->pelayan_id = Auth::id();
            $o->start = Carbon::parse('now');
            $o->meja = $value->meja;
            $o->save();
            $oi = new OrderItem;
            $oi->orders_id = $o->id;
            $oi->products_id = $value->products_id;
            $oi->jumlah_pesan = $value->jumlah;
            $oi->harga = $value->harga;
            $oi->save();
        }
    }
    public static function generate_no_order($seri)
    {
        $s = new Seri;
        $s->prefix = $seri;
        $s->save();
        return $s;
    }

}
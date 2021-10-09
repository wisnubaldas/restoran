<?php
namespace App\Libs;

use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Seri;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use DataTables;

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
            $o = new Order;
            $o->seris_id = $no_pesan->id;
            $o->no_pesan = $no_pesan->prefix.'-'.str_pad($no_pesan->id, 3, '0',STR_PAD_LEFT);
            $o->pelayan_id = Auth::id();
            $o->start = Carbon::parse('now');
            $o->save();
            
        foreach ($data as $key => $value) {
            $oi = new OrderItem;
            $oi->meja = $value->meja;
            $oi->orders_id = $o->id;
            $oi->products_id = $value->id;
            $oi->jumlah_pesan = $value->jml_order;
            $oi->harga = $value->harga;
            $oi->total = $value->total;
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
    public static function all_order_table()
    {
        // return Order::with('order_item')->get();
        $model = Order::with('order_item')->select('orders.*');

        return DataTables::of($model)
                    ->addColumn('jml_pesan', function ($s) {
                        return $s->order_item->sum('jumlah_pesan');
                    })
                    ->addColumn('status', function ($s) {
                        return '<button type="button" class="btn btn-block disabled bg-gradient-warning btn-flat">'.ucfirst($s->status).'</button>';
                    })
                    ->rawColumns(['status'])
                    ->make();
    }
    public static function proses_pesanan()
    {
        return Order::with(['order_item'=>function($q){
            return $q->with('product')->where('void',0);
        },'user'])->whereNull('finish')->where('status','bayar')->get();
    }
    public static function delete_pesanan($id)
    {
        $item = OrderItem::find($id);
        $order_id = $item->orders_id;
        $jmlOrder = OrderItem::where('orders_id',$order_id)->count();
        if($jmlOrder == 1)
        {
            $order = Order::find($order_id)->delete();
        }
        $item->delete();

    }
    public static function bayar_pesanan()
    {
        return Order::with(['order_item'=>function($q){
            return $q->with('product');
        },'user'])
        ->where('status','pesanan')
        ->get();

    }

}
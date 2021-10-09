<?php
/**
* My library trait
 */
namespace App\Libs;

use App\Libs\Pesanan;
use App\Libs\MejaData;
trait LibTrait
{
    public function getCategory()
    {
        $faker = \Faker\Factory::create();
        $pesanan = new Pesanan;
        return $pesanan->get_category()->groupBy('category')
        ->transform(function ($item, $key) use ($faker){
            $x = (object)[];
            $x->category = strtoupper($key);
            $x->jml = count($item); 
            $x->icon = $faker->randomElement([
                'fas fa-cloud-meatball',
                'fas fa-hamburger',
                'fas fa-pizza-slice',
                'fas fa-pepper-hot',
                'fas fa-carrot',
                'fas fa-seedling'
            ]);
            return $x;
        })->values();
    }
    public function getMenuByCategory($category)
    {
        $p = new Pesanan;
        return $p->get_menu_by_category($category);
    }

    public function all_meja()
    {
        return MejaData::all_meja();
    }
    public function orderan($order)
    {
        $j = json_decode($order);
        return Pesanan::set_orderan($j);
    }
    public function all_order()
    {
        return Pesanan::all_order_table();
    }
    public function proses_pesanan()
    {
        $result = [];
        foreach (Pesanan::proses_pesanan() as $key => $value) {
            foreach ($value->order_item as $k => $v) {
                $obj = new \stdClass();
                $obj->no_pesan = $value->no_pesan;
                $obj->nama = $value->user->name;
                $obj->makanan = $v->product->name;
                $obj->jumlah_pesan = $v->jumlah_pesan;
                $obj->meja = $v->meja;
                $obj->order_item_id = $v->id;
                array_push($result, $obj);
            }
            
        }
        return $result;
    }
    public function deletePesanan($id)
    {
        Pesanan::delete_pesanan($id);
    }
    public function bayar_pesanan()
    {
        $result = [];
        foreach (Pesanan::bayar_pesanan()->toArray() as $key => $v) {
            $obj = new \stdClass();
            $obj->id_pesanan = $v['id'];
            $obj->no_pesan = $v['no_pesan'];
            $obj->pelayan = $v['user']['name'];
            $total_bayar = 0;
            $obj->detail = [];
            foreach ($v['order_item'] as $d) {
                $total_bayar = $total_bayar + (integer)$d['total'];
                $dt = new \stdClass();
                $dt->jumlah_pesan = $d['jumlah_pesan'];
                $dt->meja = $d['meja'];
                $dt->harga = $d['harga'];
                $dt->total = $d['total'];
                $dt->menu = $d['product']['name'];
                array_push($obj->detail,$dt);
            }
            $obj->total_bayar = $total_bayar;
            array_push($result,$obj);
        }
        return $result;
    }
}



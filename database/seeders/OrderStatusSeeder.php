<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrderStatus;
class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name'=>'Dipesan',
                'code'=>'PA'
            ],
            [
                'name'=>'Pesanan Diproses',
                'code'=>'PB'
            ],
            [
                'name'=>'Pesanan Siap',
                'code'=>'PC'
            ],
            [
                'name'=>'Pesanan Diantar',
                'code'=>'PD',
            ],
            [
                'name'=>'Pesanan Telah Diterima',
                'code'=>'PE'
            ]
        ];
        OrderStatus::insert($data);
    }
}
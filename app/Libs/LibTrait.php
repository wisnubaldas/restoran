<?php
/**
* My library trait
 */
namespace App\Libs;

use App\Libs\Pesanan;

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
}
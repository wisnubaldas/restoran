<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new \FakerRestaurant\Provider\id_ID\Restaurant($faker));

        for ($i=0; $i < 10; $i++) { 
            $makanan = $faker->foodName();
            $minuman = $faker->beverageName();
            $susu = $faker->dairyName();
            $sayuran = $faker->vegetableName();
            $buah = $faker->fruitName();
            $daging = $faker->meatName();
            $saus = $faker->sauceName();
        }

        // $data = [
        //     ['name'=>'','code'=>'']
        // ]
    }
}

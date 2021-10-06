<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Meja;
class MejaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('id_ID');

        for ($i=0; $i < 20; $i++) { 
            $m = new Meja;
            $m->code = $faker->numerify('M-###');
            $m->tipe = $faker->randomElement([
                'Tender','2 Orang','Group','Meeting'
            ]);
            $m->save();
        }
    }
}
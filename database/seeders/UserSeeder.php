<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::find(1)->update(['email'=>'admin@admin.com']);
        \App\Models\User::find(2)->update(['email'=>'kasir@kasir.com']);
        \App\Models\User::find(3)->update(['email'=>'pelayan@pelayan.com']);
        \App\Models\User::find(4)->update(['email'=>'pembeli@pembeli.com']);
    }
}

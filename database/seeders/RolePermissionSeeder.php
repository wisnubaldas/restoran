<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use \Spatie\Permission\Models\Role;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'kasir']);
        Role::create(['name' => 'pelayan']);
        Role::create(['name' => 'pembeli']);
        $user = User::find(1);
        $user->assignRole('admin', 'kasir','pelayan','pembeli');
        $user = User::find(2);
        $user->assignRole('kasir');
        $user = User::find(3);
        $user->assignRole('pelayan');
        $user = User::find(3);
        $user->assignRole('pembeli');
    }
}
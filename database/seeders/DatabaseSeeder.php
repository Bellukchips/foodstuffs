<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin Foodstuffs',
            'email' => 'adminfoodstuffs@gmail.com',
            'password' => Hash::make('adminmasuk123'),
            'gender' => 'MALE',
            'roles' => 'ADMIN',
        ]);
    }
}

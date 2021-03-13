<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Diego Cardona',
            'email' => 'diego0123@gmail.com',
            'password' => bcrypt('Admin1234/'),
        ]);
    }
}

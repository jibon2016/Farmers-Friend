<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
            'name'      => 'Rahul',
            'phone'     => '01855555555',
            'password'  => Hash::make('12345678'),
            'district'  => 'Bogura',
            'user_type' => 'Buyer',
        ]);
    }
}

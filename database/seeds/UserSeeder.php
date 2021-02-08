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
            "name"=>"John Doe Admin",
            "email"=>"admin@medical.com",
            "role"=>1,
            "password"=>Hash::make('Password@123')
           ]);
           DB::table('users')->insert([
            "name"=>"John Doe Seller",
            "email"=>"seller@medical.com",
            "role"=>2,
            "password"=>Hash::make('Password@123')
           ]);
           DB::table('users')->insert([
            "name"=>"John Doe Buyer",
            "email"=>"buyer@medical.com",
            "role"=>3,
            "password"=>Hash::make('Password@123')
           ]);
    }
}

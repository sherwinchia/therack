<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'Admin',
                'email'=>'admin@therack.com',
                'password'=>Hash::make('admin'),
                'role'=>'Admin'
            ],
            [
                'id'=>2,
                'name'=>'Dawn Roe',
                'email'=>'dawnroe@gmail.com',
                'password'=>Hash::make('dawnroe'),
                'role'=>'Customer'
            ],
            [
                'id'=>3,
                'name'=>'John Doe',
                'email'=>'john_doe@gmail.com',
                'password'=>Hash::make('johndoe'),
                'role'=>'Customer'
            ],
            [
                'id'=>4,
                'name'=>'Emillie Norton',
                'email'=>'emillie_norton@gmail.com',
                'password'=>Hash::make('johndoe'),
                'role'=>'Customer'
            ],
        ]);
    }
}
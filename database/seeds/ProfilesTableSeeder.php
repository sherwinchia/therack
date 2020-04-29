<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            [
                'id'=>1,
                'user_id'=>1,
                'phonenumber'=>'011151552928',
                'country'=>'Singapore',
                'city'=>'Singapore',
                'address'=>'Buangkok Green 512-4a',
                'zipcode'=>42132
            ],
            [
                'id'=>2,
                'user_id'=>2,
                'phonenumber'=>'08215551234',
                'country'=>'Indonesia',
                'city'=>'Medan',
                'address'=>'Danau Toba',
                'zipcode'=>27321
            ],
            [
                'id'=>3,
                'user_id'=>3,
                'phonenumber'=>'42912345',
                'country'=>'United State of America',
                'city'=>'Seattle',
                'address'=>'Downtown Seattle ST 17',
                'zipcode'=>78231
            ],
            [
                'id'=>4,
                'user_id'=>4,
                'phonenumber'=>'032912345',
                'country'=>'China',
                'city'=>'Guangzhou',
                'address'=>'ST 23a',
                'zipcode'=>78213
            ],

        ]);
    }
}
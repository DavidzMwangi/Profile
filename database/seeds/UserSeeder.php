<?php

use Carbon\Carbon;
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
        //
        $users = [

            [

                'email'             => 'mwangidavidwanjohi@gmail.com',
                'email_2'             => 'mwangidavidwanjohi@yahoo.com',
                'name'=>'David Wanjohi',
                'phone'=>'0705850774',
                'phone_2'=>'0708887390',
                'picture'=>'user.jpg',
                'profile_description'=>'I am a software developer',
                'completed_works'=>10,
                'completed_years'=>3,
                'clients'=>10,
                'password'          => bcrypt('1234'),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],

        ];


        \Illuminate\Support\Facades\DB::table('users')->insert($users);
    }
}

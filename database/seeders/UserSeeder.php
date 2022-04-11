<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        DB::table('users')->insert(
            [
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('admin'),
                'gender' => 'Male',
                'role_id' => 1,
                'join_date' => Carbon::now(),
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'Donny',
                'email' => 'donny@mail.com',
                'password' => bcrypt('donny'),
                'gender' => 'Male',
                'role_id' => 2,
                'join_date' => Carbon::now(),
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'Jeremy M',
                'email' => 'jermy.m@gmail.com',
                'password' => bcrypt('jeremy'),
                'gender' => 'Male',
                'role_id' => 2,
                'join_date' => Carbon::now(),
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'Sam',
                'email' => 'sam@gmail.com',
                'password' => bcrypt('sammy'),
                'gender' => 'Female',
                'role_id' => 2,
                'join_date' => Carbon::now(),
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'Dummy Am I',
                'email' => 'dummy@mail.com',
                'password' => bcrypt('dummy'),
                'gender' => 'Female',
                'role_id' => 2,
                'join_date' => Carbon::now(),
            ]
        );
    }
}

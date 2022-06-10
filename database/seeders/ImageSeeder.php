<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('images')->insert(
            [
                'user_id' => 1,
                'path' => 'storage/image/dummy-user.png'
            ]
        );
        DB::table('images')->insert(
            [
                'user_id' => 2,
                'path' => 'storage/image/dummy-user.png'
            ]
        );
        DB::table('images')->insert(
            [
                'user_id' => 3,
                'path' => 'storage/image/dummy-user.png'
            ]
        );
        DB::table('images')->insert(
            [
                'user_id' => 4,
                'path' => 'storage/image/dummy-user.png'
            ]
        );
        DB::table('images')->insert(
            [
                'user_id' => 5,
                'path' => 'storage/image/dummy-user.png'
            ]
        );
    }
}

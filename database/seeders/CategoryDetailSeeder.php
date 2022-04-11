<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoryDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category_details')->insert(
            [
                'post_id' => 1,
                'category_id' => 1
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 2,
                'category_id' => 3
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 3,
                'category_id' => 1
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 4,
                'category_id' => 1
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 5,
                'category_id' => 2
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 6,
                'category_id' => 5
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 7,
                'category_id' => 3
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 8,
                'category_id' => 2
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 9,
                'category_id' => 4
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 10,
                'category_id' => 3
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 11,
                'category_id' => 1
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 12,
                'category_id' => 2
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 13,
                'category_id' => 3
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 14,
                'category_id' => 4
            ]
        );

        DB::table('category_details')->insert(
            [
                'post_id' => 15,
                'category_id' => 5
            ]
        );
    }
}

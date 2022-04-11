<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert(
            [
                'category_name' => 'Mathematics'
            ]
        );

        DB::table('categories')->insert(
            [
                'category_name' => 'English'
            ]
        );

        DB::table('categories')->insert(
            [
                'category_name' => 'Programming'
            ]
        );

        DB::table('categories')->insert(
            [
                'category_name' => 'History'
            ]
        );

        DB::table('categories')->insert(
            [
                'category_name' => 'Science'
            ]
        );
    }
}

<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(
            [
                'title' => 'Trigonometri Help needed',
                'content' => 'Help me with trigonometri I dont understand',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'I am confused on merge sort.',
                'content' => 'So I need help with several sorting algorithms, for starters can any1 help me with merge sort?',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Answers needed.',
                'content' => 'I need help on 5 + 5',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );
        
        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );

        DB::table('posts')->insert(
            [
                'title' => 'Dummy Post',
                'content' => 'This is a dummy post',
                'post_date' => Carbon::now()
            ]
        );
    }
}

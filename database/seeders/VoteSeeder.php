<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('votes')->insert(
            [
                'vote_name' => 'Downvote'
            ]

        );

        DB::table('votes')->insert(
            [
                'vote_name' => 'Upvote'
            ]
        );
    }
}

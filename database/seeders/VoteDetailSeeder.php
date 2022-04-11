<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VoteDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vote_details')->insert(
            [
                'user_id' => 2,
                'post_id' => 1,
                'vote_id' => 2
            ]
        );

        DB::table('vote_details')->insert(
            [
                'user_id' => 3,
                'post_id' => 1,
                'vote_id' => 2
            ]
        );

        DB::table('vote_details')->insert(
            [
                'user_id' => 3,
                'post_id' => 3,
                'vote_id' => 1
            ]
        );
    }
}

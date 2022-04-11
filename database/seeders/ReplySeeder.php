<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReplySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('replies')->insert(
            [
                'user_id' => 2,
                'post_id' => 2,
                'reply_content' => 'Merge sort uses divide and conquer',
                'reply_date' => Carbon::now()
            ]
        );

        DB::table('replies')->insert(
            [
                'user_id' => 3,
                'post_id' => 3,
                'reply_content' => 'its 10',
                'reply_date' => Carbon::now()
            ]
        );
    }
}

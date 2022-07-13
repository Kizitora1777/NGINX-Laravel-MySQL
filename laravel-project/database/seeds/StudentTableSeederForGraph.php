<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StudentTableSeederForGraph extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 5) as $num) {
            $date = Carbon::now()->addDays(mt_rand(-6, 0));
            DB::table('student')->insert([
                'subject' => '国語',
                'hour' => mt_rand(0, 2),
                'minute' => mt_rand(0, 59),
                'comment' => "サンプルコメント: ${num}",
                'user_id' => 5409,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }

        foreach (range(1, 5) as $num) {
            $date = Carbon::now()->addDays(mt_rand(-6, 0));
            DB::table('student')->insert([
                'subject' => '数学',
                'hour' => mt_rand(0, 2),
                'minute' => mt_rand(0, 59),
                'comment' => "サンプルコメント: ${num}",
                'user_id' => 5409,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }

        foreach (range(1, 5) as $num) {
            $date = Carbon::now()->addDays(mt_rand(-6, 0));
            DB::table('student')->insert([
                'subject' => '英語',
                'hour' => mt_rand(0, 2),
                'minute' => mt_rand(0, 59),
                'comment' => "サンプルコメント: ${num}",
                'user_id' => 5409,
                'created_at' => $date,
                'updated_at' => $date,
            ]);
        }
    }
}

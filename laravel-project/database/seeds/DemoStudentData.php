<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class DemoStudentData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(0,7) as $i){
            $date = Carbon::now()->subDays($i);
            foreach ( range(5401,5440) as $num) {
                DB::table('student')->insert([
                    'subject' => 'japanese',
                    'hour' => mt_rand(0, 23),
                    'minute' => mt_rand(0, 59),
                    'comment' => "sample comment: ${i}",
                    'user_id' => $num,
                    'created_at' => $date,
                    'updated_at' => $date,
                ]);
            }
        }
    }
}

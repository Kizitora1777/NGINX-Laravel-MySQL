<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class StudiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (range(1, 3) as $num) {
            DB::table('studies')->insert([
                'subject' => '国語',
                'study-time' => Carbon::now()->format('h:i:s'),
                'memo' => "サンプルメモ: ${num}",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}

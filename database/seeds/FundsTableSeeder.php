<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class FundsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $funds = [];
        foreach (config('constants.funds') as $fund) {
            $funds[] = [
                'name' => $fund,
                'created_at' => Carbon::now()
            ];
        }

        DB::table('funds')->insert($funds);
    }
}

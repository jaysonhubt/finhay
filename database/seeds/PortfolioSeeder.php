<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfolios = [];
        foreach (config('constants.portfolios') as $portfolio) {
            $portfolios[] = [
                'name' => $portfolio,
                'created_at' => Carbon::now()
            ];
        }

        DB::table('portfolios')->insert($portfolios);
    }
}

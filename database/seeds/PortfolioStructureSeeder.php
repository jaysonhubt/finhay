<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PortfolioStructureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $portfoliosStructures = [];
        foreach (config('constants.portfolio_structure') as $portfolioId => $portfoliosStructure) {
            foreach ($portfoliosStructure as $fundId => $percent) {
                $portfoliosStructures[] = [
                    'portfolio_id' => $portfolioId,
                    'fund_id' => $fundId,
                    'percent' => $percent,
                    'created_at' => Carbon::now()
                ];
            }
        }

        DB::table('portfolio_structures')->insert($portfoliosStructures);
    }
}

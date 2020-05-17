<?php

namespace App\Services;

use App\Models\Fund;
use App\Models\FundPrice;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Collection;

class FundService extends BaseService
{
    public function __construct(Fund $fund)
    {
        $this->model = $fund;
    }

    public function getFundPriceByFundId(int $fundId): Collection
    {
        return FundPrice::where('fund_id', $fundId)->get();
    }

    public function crawlFundsData(): void
    {
        $funds = config('constants.funds');
        $client = new Client();

        foreach ($funds as $fundId => $fundName) {
            $response = $client->request('get', "https://nav.finhay.com.vn/public/nav?name=$fundName");
            $result = $response->getBody()->getContents();

            $fundPrices = [];

            $fund = $this->findById($fundId);
            $latestItemDate = null;

            foreach (json_decode($result) as $item) {
                $itemDate = gmdate('Y-m-d', substr($item[0], 0, 10));
                if ($fund->latest_update >= $itemDate) {
                    continue;
                }

                $fundPrices[] = [
                    'fund_id' => $fundId,
                    'date' => $itemDate,
                    'price' => $item[1],
                    'created_at' => Carbon::now()
                ];

                $latestItemDate = $itemDate;
            }

            FundPrice::insert($fundPrices);

            $fund->latest_update = $latestItemDate;
            $fund->save();
        }
    }
}

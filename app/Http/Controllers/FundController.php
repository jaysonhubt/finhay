<?php

namespace App\Http\Controllers;

use App\Services\FundService;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class FundController extends Controller
{
    private $fundService;

    public function __construct(FundService $finhayService)
    {
        $this->fundService = $finhayService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function crawlData()
    {
        $this->fundService->crawlFundsData();

        return redirect()->route('home');
    }

    public function getFundPrice(Request $request)
    {
        return $this->fundService->getFundPriceByFundId($request->id);
    }
}

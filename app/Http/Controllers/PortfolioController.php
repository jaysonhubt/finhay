<?php

namespace App\Http\Controllers;

use App\Services\PortfolioService;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    private $portfolioService;

    public function __construct(PortfolioService $portfolioService)
    {
        $this->portfolioService = $portfolioService;
    }

    public function getPortfolioStructure(Request $request)
    {
        return $this->portfolioService->getPortfolioStructureById($request->id);
    }
}

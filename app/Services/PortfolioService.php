<?php

namespace App\Services;

use App\Models\Portfolio;

class PortfolioService extends BaseService
{
    public function __construct(Portfolio $portfolio)
    {
        $this->model = $portfolio;
    }

    public function getPortfolioStructureById(int $portfolioId)
    {
        return $this->findById($portfolioId, ['structure', 'structure.fund']);
    }
}

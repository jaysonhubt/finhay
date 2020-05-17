<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function structure()
    {
        return $this->hasMany(PortfolioStructure::class);
    }
}

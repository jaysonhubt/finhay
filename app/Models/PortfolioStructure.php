<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioStructure extends Model
{
    public function portfolio()
    {
        return $this->belongsTo(Portfolio::class);
    }

    public function fund()
    {
        return $this->belongsTo(Fund::class);
    }
}

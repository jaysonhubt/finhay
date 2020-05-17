<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class BaseService
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param int $id
     * @param array $relationship
     * @return Builder|Builder[]|Collection|Model|null
     */
    public function findById(int $id, $relationship = [])
    {
        return $this->model->with($relationship)->find($id);
    }
}

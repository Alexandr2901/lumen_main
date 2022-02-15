<?php

namespace App\Repositories;

use App\Contracts\Repositories\NewsRepositoryContract;
use App\Models\News;

class NewsRepository extends BaseRepository implements NewsRepositoryContract
{
    public function __construct(News $model)
    {
        $this->model = $model;
    }
}

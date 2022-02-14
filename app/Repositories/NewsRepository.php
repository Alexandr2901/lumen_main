<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryContract;
use App\Contracts\Repositories\NewsRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;

class NewsRepository extends BaseRepository implements NewsRepositoryContract
{
    public function __construct(News $model)
    {
        $this->model = $model;
    }
}

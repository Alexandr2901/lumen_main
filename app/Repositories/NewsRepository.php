<?php

namespace App\Repositories;

use App\Contracts\Repositories\NewsRepositoryContract;
use App\Models\News;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class NewsRepository extends BaseRepository implements NewsRepositoryContract
{
    public function __construct(News $model)
    {
        $this->model = $model;
    }

    public function paginate($page = null,
                             $count = 15

    ): LengthAwarePaginator
    {
        return Cache::tags(['news', 'tags'])->remember(
            'paginate/' . implode('/', func_get_args()),
            3600,
            function () use ($count, $page) {
                return $this->model->query()
                    ->paginate($count, ['*'], 'page', $page);
            });
    }
}

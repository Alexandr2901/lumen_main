<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryContract;
use App\Contracts\Repositories\NewsRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Models\News;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class TagsRepository extends BaseRepository implements TagRepositoryContract
{
    public function __construct(Tag $model)
    {
        $this->model = $model;
    }

    public function findOrCreate(array $data): ?Collection
    {
        $collection = collect();
        foreach ($data as $item) {
            $collection->push($this->model->firstOrCreate([
                'name'=>$item
            ]));
        }
return $collection;
    }
}

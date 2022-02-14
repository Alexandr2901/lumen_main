<?php

namespace App\Services;

use App\Contracts\Repositories\BaseRepositoryContract;
use App\Contracts\Repositories\NewsRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Contracts\Services\NewsServiceContract;
use App\Models\News;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class NewsService implements NewsServiceContract
{

    public function __construct(
        News $model,
        TagRepositoryContract $tagRepository,
        NewsRepositoryContract $newsRepository
    )
    {
        $this->model = $model;
        $this->tagRepository = $tagRepository;
        $this->newsRepository = $newsRepository;

    }

    public function create(array $data): ?Model
    {
        $news = $this->newsRepository
            ->create(Arr::only($data, ['title', 'text','category_id']));

        $news->tags()->sync($this->tagRepository->findOrCreate($data['tags'])->pluck('id'));

        return $news;
    }

    public function update(array $data, int $id): bool
    {
        $res = $this->newsRepository
            ->update($id,Arr::only($data, ['title', 'text','category_id']));


        if (Arr::has($data, 'tags')) {
            $this->newsRepository->find($id)->tags()
                ->sync($this->tagRepository->findOrCreate($data['tags'])->pluck('id'));
        }

        return $res;
    }
}

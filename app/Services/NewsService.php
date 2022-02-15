<?php

namespace App\Services;

use App\Contracts\Repositories\BaseRepositoryContract;
use App\Contracts\Repositories\NewsRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Contracts\Repositories\UserRepositoryContract;
use App\Contracts\Services\NewsServiceContract;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class NewsService implements NewsServiceContract
{

    public function __construct(
        News $model,
        TagRepositoryContract $tagRepository,
        NewsRepositoryContract $newsRepository,
        UserRepositoryContract $userRepository
    )
    {
        $this->model = $model;
        $this->tagRepository = $tagRepository;
        $this->newsRepository = $newsRepository;
        $this->userRepository = $userRepository;

    }

    public function create(array $data,int $userId): ?Model
    {
        $news = $this->newsRepository
            ->create(Arr::only($data, ['title', 'text','category_id']));
        $news->users()->sync($userId);
        if (Arr::has($data, 'users')) {
//            var_dump($data['users']);
            $news->users()->syncWithoutDetaching($data['users']);
        }
        $news->tags()->sync($this->tagRepository->findOrCreate($data['tags'])->pluck('id'));
//        $news->save();
        return $news;
    }

    public function update(array $data, int $id): bool
    {
//        $res = $this->newsRepository
//            ->update($id,Arr::only($data, ['title', 'text','category_id']));

        $news = $this->newsRepository->find($id);

        if (Arr::has($data, 'users')) {
            $news->users()->syncWithoutDetaching(Arr::only($data, ['users']));
        }

        $news->update(Arr::only($data, ['title', 'text','category_id']));

        if (Arr::has($data, 'tags')) {
            $this->newsRepository->find($id)->tags()
                ->sync($this->tagRepository->findOrCreate($data['tags'])->pluck('id'));
        }
        return (bool)$news;
    }
}

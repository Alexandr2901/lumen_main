<?php

namespace App\Providers;

use App\Contracts\Repositories\BaseRepositoryContract;
use App\Contracts\Repositories\NewsRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Contracts\Repositories\UserRepositoryContract;
use App\Contracts\Services\NewsServiceContract;
use App\Repositories\BaseRepository;
use App\Repositories\NewsRepository;
use App\Repositories\TagsRepository;
use App\Repositories\UserRepository;
use App\Services\NewsService;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{

    public $bindings = [
//        NewsService::class => NewsRepositoryContract::class,
//        NewsRepositoryContract::class => NewsService::class,
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserRepositoryContract::class, UserRepository::class);
        $this->app->bind(TagRepositoryContract::class, TagsRepository::class);
        $this->app->bind(NewsRepositoryContract::class, NewsRepository::class);

        $this->app->bind(NewsServiceContract::class, NewsService::class);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
//                $this->app->bind(BaseRepositoryContract::class, BaseRepository::class);

    }
}

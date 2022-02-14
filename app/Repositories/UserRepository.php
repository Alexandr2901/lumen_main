<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryContract;
use App\Contracts\Repositories\NewsRepositoryContract;
use App\Contracts\Repositories\TagRepositoryContract;
use App\Contracts\Repositories\UserRepositoryContract;
use App\Models\News;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryContract
{
    public function __construct(User $model)
    {
        $this->model = $model;
    }
}

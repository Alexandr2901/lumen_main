<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface TagRepositoryContract extends BaseRepositoryContract
{
    public function findOrCreate(array $data): ?Collection;
}

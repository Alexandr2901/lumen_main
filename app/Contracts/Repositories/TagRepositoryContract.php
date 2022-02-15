<?php

namespace App\Contracts\Repositories;

use Illuminate\Support\Collection;

interface TagRepositoryContract extends BaseRepositoryContract
{
    public function findOrCreate(array $data): ?Collection;
}

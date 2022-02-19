<?php

namespace App\Contracts\Repositories;

use Illuminate\Pagination\Paginator;

interface NewsRepositoryContract extends BaseRepositoryContract
{
    public function paginateAndFilter(int $page, int $count, array $users, array $tags): Paginator;
}

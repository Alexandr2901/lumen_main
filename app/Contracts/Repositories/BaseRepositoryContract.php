<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface BaseRepositoryContract
{
    public function create(array $data): ?Model;

    public function update(string $id, array $fields): bool;

    public function find(string $id): ?Model;

    public function destroy(string $id): bool;

    public function all(): Collection;

    public function paginate(int $count,int $page): LengthAwarePaginator;
}

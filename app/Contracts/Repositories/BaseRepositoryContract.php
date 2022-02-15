<?php

namespace App\Contracts\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseRepositoryContract
{
    public function create(array $data): ?Model;

    public function update(string $id, array $fields): bool;

    public function find(string $id): ?Model;

    public function destroy(string $id): bool;

    public function all(): Collection;

}

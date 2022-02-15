<?php

namespace App\Contracts\Services;


use Illuminate\Database\Eloquent\Model;

interface NewsServiceContract
{
    public function create(array $data, int $userId): ?Model;

    public function update(array $data, int $id): bool;
}

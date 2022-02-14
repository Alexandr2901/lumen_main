<?php
namespace App\Contracts\Services;


use App\Models\News;
use Illuminate\Database\Eloquent\Model;

interface NewsServiceContract
{
    public function create(array $data): ?Model;
    public function update(array $data, int $id): bool;
}

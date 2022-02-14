<?php

namespace App\Repositories;

use App\Contracts\Repositories\BaseRepositoryContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class BaseRepository implements BaseRepositoryContract
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $data): ?Model
    {
        return $this->model->create($data);
    }

    public function update(string $id, array $fields): bool
    {
        return $this->find($id)->update($fields);
    }

    public function find(string $id): ?Model
    {
        return $this->model->find($id);
    }

    public function destroy(string $id): bool
    {
        return $this->find($id)->delete();
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function paginate(): Collection
    {
        return $this->model->paginate(15);
    }
}

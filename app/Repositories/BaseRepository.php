<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use stdClass;

class BaseRepository implements BaseRepositoryInterface
{
    public function __construct(
        protected Model $model,
    ){}

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function find(int|string $id): ?stdClass
    {
        return (object) $this->model->findOrFail($id)->toArray();
    }

    protected function format(Model $model): stdClass
    {
        return (object) $model->toArray();
    }

}

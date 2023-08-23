<?php

namespace App\Repositories;

use Illuminate\Support\Collection;
use stdClass;

interface BaseRepositoryInterface
{
    public function all(): Collection;
    public function find(int|string $id): ?stdClass;
}

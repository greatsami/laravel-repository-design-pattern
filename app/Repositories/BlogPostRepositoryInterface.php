<?php

namespace App\Repositories;

use App\DataTransferObjects\BlogPostDto;
use Illuminate\Support\Collection;
use stdClass;

interface BlogPostRepositoryInterface
{
    public function create(BlogPostDto $dto): stdClass;
    public function update(int $id, BlogPostDto $dto): stdClass;
    public function delete(int $id): bool;

}

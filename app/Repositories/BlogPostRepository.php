<?php

namespace App\Repositories;

use App\DataTransferObjects\BlogPostDto;
use App\Models\BlogPost;
use Exception;
use stdClass;

class BlogPostRepository extends BaseRepository implements BlogPostRepositoryInterface
{
    public function __construct(BlogPost $blogPost)
    {
        parent::__construct($blogPost);
    }

    public function create(BlogPostDto $dto): stdClass
    {
        return (object) $this->model->create([
            'title' => $dto->title,
            'body' => $dto->body,
            'source' => $dto->source,
            'published_at' => $dto->publishedAt,
        ])->toArray();
    }

    public function update(int $id, BlogPostDto $dto): stdClass
    {
        $model = $this->model->find($id);

        if (!$model) {
            throw new Exception("Not found!");
        }

        $model = tap($model)->update([
            'title' => $dto->title,
            'body' => $dto->body,
            'source' => $dto->source,
            'published_at' => $dto->publishedAt,
        ]);
        return (object) $model->toArray();
    }

    public function delete(int $id): bool
    {
        $model = $this->model->find($id);

        if (!$model) {
            throw new Exception("Not found!");
        }

        return $model->delete();
    }
}

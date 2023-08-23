<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\BlogPostDto;
use App\Http\Requests\BlogPostRequest;
use App\Http\Resources\BlogPostResource;
use App\Models\BlogPost;
use App\Repositories\BlogPostRepositoryInterface;

class BlogPostController extends Controller
{
    public function __construct(
        protected BlogPostRepositoryInterface $repository,
    ){}

    public function index()
    {
        return BlogPostResource::collection(
            $this->repository->all()
        );
    }

    public function store(BlogPostRequest $request)
    {
        return BlogPostResource::make(
            $this->repository->create(
                BlogPostDto::fromRequest($request)
            )
        );
    }

    public function show(BlogPost $blogPost)
    {
        return BlogPostResource::make(
            $this->repository->find($blogPost->id)
        );
    }

    public function update(BlogPostRequest $request, BlogPost $blogPost)
    {
        return BlogPostResource::make(
            $this->repository->update(
                $blogPost->id,
                BlogPostDto::fromRequest($request)
            )
        );
    }

    public function destroy(BlogPost $blogPost)
    {
        $this->repository->delete($blogPost->id);
    }
}

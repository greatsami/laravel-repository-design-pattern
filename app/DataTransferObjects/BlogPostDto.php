<?php

namespace App\DataTransferObjects;

use App\Enum\BlogPostSourceEnum;
use App\Http\Requests\BlogPostRequest;
use Carbon\Carbon;

class BlogPostDto
{
    public function __construct(
        public readonly string $title,
        public readonly string $body,
        public readonly BlogPostSourceEnum $source,
        public readonly ?Carbon $publishedAt,
    ){}

    public static function fromRequest(BlogPostRequest $request): BlogPostDto
    {
        return new self(
            title: $request->validated('title'),
            body: $request->validated('body'),
            source: BlogPostSourceEnum::from($request->validated('source')),
            publishedAt: Carbon::parse($request->validated('published_at')),
        );
    }
}

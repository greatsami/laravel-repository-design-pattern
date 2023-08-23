<?php

namespace App\Http\Requests;

use App\Enum\BlogPostSourceEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class BlogPostRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'title' => ['required', 'max:80'],
            'body' => ['required', 'max:1024'],
            'source' => ['required', new Enum(BlogPostSourceEnum::class)],
            'published_at' => ['nullable', 'date'],
        ];
    }
}

<?php

namespace App\DataTransferObjects;

use App\Enum\BlogPostSourceEnum;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\BlogPostRequest;
use Carbon\Carbon;

class AuthDto
{
    public function __construct(
        public readonly string $email,
        public readonly string $password,
    ){}

    public static function fromRequest(AuthRequest $request): AuthDto
    {
        return new self(
            email: $request->validated('email'),
            password: $request->validated('password'),
        );
    }
}

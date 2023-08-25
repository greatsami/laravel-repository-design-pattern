<?php

namespace App\DataTransferObjects;

use App\Http\Requests\RegisterRequest;

class RegisterDto
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
        public readonly array $permissions,
    ){}

    public static function fromRequest(RegisterRequest $request): RegisterDto
    {
        return new self(
            name: $request->validated('name'),
            email: $request->validated('email'),
            password: $request->validated('password'),
            permissions: $request->validated('permissions') ?? ['blog_post-list'],
        );
    }
}

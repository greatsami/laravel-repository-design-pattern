<?php

namespace App\Repositories;

use App\DataTransferObjects\AuthDto;
use App\DataTransferObjects\RegisterDto;
use Illuminate\Http\Request;
use stdClass;

interface AuthenticationRepositoryInterface
{
    public function login(AuthDto $dto): array;
    public function register(RegisterDto $dto): stdClass;
    public function logout(Request $request): stdClass;

}

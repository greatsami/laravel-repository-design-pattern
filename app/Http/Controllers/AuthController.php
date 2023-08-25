<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\AuthDto;
use App\Http\Requests\AuthRequest;
use App\Repositories\AuthenticationRepositoryInterface;

class AuthController extends Controller
{
    public function __construct(
        protected AuthenticationRepositoryInterface $authenticationRepository,
    ){}

    public function __invoke(AuthRequest $request)
    {
        return $this->authenticationRepository->login(
            AuthDto::fromRequest($request),
        );
    }

}

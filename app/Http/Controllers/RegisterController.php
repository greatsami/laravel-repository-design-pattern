<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\RegisterDto;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Repositories\AuthenticationRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __construct(
        protected AuthenticationRepositoryInterface $authenticationRepository
    ){}

    public function __invoke(RegisterRequest $request)
    {
        return $this->authenticationRepository->register(
            RegisterDto::fromRequest($request),
        );
    }
}

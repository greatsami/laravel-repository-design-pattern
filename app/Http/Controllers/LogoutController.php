<?php

namespace App\Http\Controllers;

use App\Repositories\AuthenticationRepositoryInterface;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct(
        protected AuthenticationRepositoryInterface $authenticationRepository
    ){}

    public function __invoke(Request $request)
    {
        return $this->authenticationRepository->logout($request);
    }
}

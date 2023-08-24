<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function __invoke(RegisterRequest $request)
    {
        $data = $request->validated() + ['permissions' => []];
        $user = User::create($data);

        Auth::loginUsingId($user->id);

        return response()->json([
            'message' => 'Registered successfully',
            'user' => $user,
            'token' => $user->createToken('user', $user->permissions)->plainTextToken
        ], 201);

    }
}

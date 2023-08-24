<?php

namespace App\Http\Controllers;

use App\DataTransferObjects\AuthDto;
use App\Http\Requests\AuthRequest;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function __invoke(AuthRequest $request)
    {
        $user = User::whereEmail($request->validated('email'))->first();

        if (!$user || !Hash::check($request->validated('password'), $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        auth()->attempt([
            'email' => $request->validated('email'),
            'password' => $request->validated('password'),
            // new AuthDto(
            //     $request->validated('email'),
            //     $request->validated('password'),
            // )
        ]);

        return response()->json([
            'message' => 'loggedIn successfully',
            'user' => AuthResource::make($user),
            'token' => $user->createToken('admin', $user->permissions)->plainTextToken
        ], 201);
    }

}

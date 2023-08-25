<?php

namespace App\Repositories;

use App\DataTransferObjects\AuthDto;
use App\DataTransferObjects\RegisterDto;
use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use stdClass;

class AuthenticationRepository extends BaseRepository implements AuthenticationRepositoryInterface
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function login(AuthDto $dto): array
    {
        $user = $this->model->where('email', $dto->email)->first();

        if (!$user || !Hash::check($dto->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        auth()->attempt([
            'email' => $dto->email,
            'password' => $dto->password,
        ]);

        $token = $user->createToken('admin', $user->permissions)->plainTextToken;

        return [
            'message' => 'loggedIn successfully',
            'user' => AuthResource::make($user),
            'token' => $token
        ];
    }

    public function register(RegisterDto $dto): stdClass
    {
        $user = User::create([
            'name' => $dto->name,
            'email' => $dto->email,
            'password' => $dto->password,
            'permissions' => $dto->permissions,
        ]);
        $token = $user->createToken('admin', $user->permissions)->plainTextToken;

        return (object) [
            'message' => 'Registered successfully',
            'user' => AuthResource::make($user),
            'token' => $token
        ];
    }

    public function logout(Request $request): stdClass
    {
        // Revoke all tokens...
        $this->model->tokens()->delete();
        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();

        return (object) [
            'message' => 'logged out successfully',
        ];
    }
}

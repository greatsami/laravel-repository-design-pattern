<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $user = $request->user();

        // Revoke all tokens...
        $user->tokens()->delete();
        // Revoke the token that was used to authenticate the current request...
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'logged out successfully',
        ], 201);
    }
}

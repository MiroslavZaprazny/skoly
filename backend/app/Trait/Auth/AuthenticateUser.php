<?php

namespace App\Trait\Auth;

use App\Models\User;

trait AuthenticateUser
{
    protected function authUser(User $user)
    {
        if (auth()->user()->id !== $user->id) {
            return response()->json([
                'message' => 'invalid credentials',
                'status' => 402
            ]);
        }
    }
}

<?php

namespace App\Trait\Auth;

use App\Models\User;

trait AuthenticateUser
{
    protected function authUser(int $userId)
    {
        if (auth()->user()->id !== $userId) {
            return response()->json([
                'message' => 'Not authorized to make this request',
                'status' => 402
            ]);
        }
    }
}

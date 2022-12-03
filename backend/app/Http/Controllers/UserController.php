<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\ShowUserResource;
use App\Models\User;
use App\Services\User\UserService;

class UserController extends Controller
{
    public function show(User $user, string $verificationCode)
    {
        if ($user->isAuthorized($verificationCode) === false) {
            return response()->json([
                'message' => 'invalid credentials',
                402
            ]);
        }

        return new ShowUserResource($user);
    }

    public function update(User $user, string $verificationCode, UpdateUserRequest $request)
    {
        if ($user->isAuthorized($verificationCode) === false) {
            return response()->json([
                'message' => 'invalid credentials',
                'status' => 402
            ]);
        }
        $user->update($request->validated());

        return response()->json([
            'message' => 'Úspešne ste si akutalizovali profil'
        ]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\User\ShowUserResource;
use App\Models\User;
use App\Trait\Auth\AuthenticateUser;

class UserController extends Controller
{
    use AuthenticateUser;

    public function show(User $user)
    {
        if ($this->authUser($user->id)) {
            return $this->authUser($user->id);
        }

        return new ShowUserResource($user);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        if ($this->authUser($user->id)) {
            return $this->authUser($user->id);
        }

        $user->update($request->validated());

        return response()->json([
            'message' => 'Úspešne ste si akutalizovali profil'
        ]);
    }
}

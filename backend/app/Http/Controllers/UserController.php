<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        User::create($request->validated());

        return response()->json([
            "message" => "Úspešne ste sa zaregistrovali"
        ]);
    }
}

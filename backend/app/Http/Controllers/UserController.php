<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(StoreUserRequest $request)
    {
        User::create($request->validated());

        return response()->json([
            "message" => "Úspešne ste sa zaregistrovali"
        ]);
    }

    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();

        if (!Auth::attempt($request->validated())) {
            return response()->json(["error" => "Zadali ste nesprávne heslo"], 401);
        }

        $token = auth()->user()->createToken('main')->plainTextToken;

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token
        ]);
    }
}

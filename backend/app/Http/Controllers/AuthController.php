<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\User\UserResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        User::create($request->validated());

        return response()->json([
            "message" => "Úspešne ste sa zaregistrovali"
        ]);
    }

    public function login(LoginRequest $request)
    {
        if (!Auth::attempt($request->validated())) {
            return response()->json(["error" => "Zadali ste nesprávne heslo"], 401);
        }

        $token = auth()->user()->createToken('main')->plainTextToken;
        $user = User::where('email', $request->email)->firstOrFail();

        return response()->json([
            'user' => new UserResource($user),
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Úspešne ste sa odlhásili'
        ]);
    }
}

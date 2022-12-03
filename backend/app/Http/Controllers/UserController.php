<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShowUserResource;
use App\Models\User;

class UserController extends Controller
{
    public function show(User $user, string $verificationCode)
    {
        if($verificationCode !== $user->verification_code) {
           return response()->json([
            'message' => 'Invalid Credentials'
           ]); 
        }

       return new ShowUserResource($user); 
    }
}

<?php

namespace App\Http\Controllers\Rating;

use App\Http\Controllers\Controller;
use App\Models\Rating;
use App\Models\Rating\Like;
use App\Trait\Auth\AuthenticateUser;

class LikeController extends Controller
{
    use AuthenticateUser;

    public function create(Rating $rating)
    {
        if (!$this->authUser($rating->user_id)) {
            return $this->authUser($rating->user_id);
        }

        Like::create([
            'rating_id' => $rating->id,
            'user_id' => auth()->user()->id,
        ]);

        return response()->json(['message' => 'Success']);
    }
}

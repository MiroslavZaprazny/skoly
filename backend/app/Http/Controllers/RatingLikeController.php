<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\RatingLike;
use App\Trait\Auth\AuthenticateUser;

class RatingLikeController extends Controller
{
    use AuthenticateUser;

    public function create(Rating $rating)
    {
        if (!$this->authUser($rating->user_id)) {
            return $this->authUser($rating->user_id);
        }

        RatingLike::create([
            'rating_id' => $rating->id,
            'user_id' => auth()->user()->id,
        ]);

        return response()->json(['message' => 'Success']);
    }
}

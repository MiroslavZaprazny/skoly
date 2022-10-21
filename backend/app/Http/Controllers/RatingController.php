<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function store(StoreRatingRequest $request)
    {
        Rating::create($request->validated());

        return response()->json('Hodnotenie bolo úspšene vytvorené', 201);
    }

    public function destroy(Rating $rating, Request $request, $user = null)
    {
        if ($user == null && $rating->user_ip != $request->ip()) {
            return response()->json('Nemáte oprávnenie vymazať hodnotenie', 403);
        } else if (!$rating->user_id == $user) {
            return response()->json('Nemáte oprávnenie vymazať hodnotenie', 403);
        }
        $rating->delete();

        return response()->json('Hodnotenie bolo úspšene odstránené', 201);
    }
}

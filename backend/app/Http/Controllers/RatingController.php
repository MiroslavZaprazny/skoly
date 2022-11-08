<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;
use App\Http\Resources\ShowRatingResource;
use App\Models\User;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function show(Rating $rating)
    {
        return new ShowRatingResource($rating->load(['user', 'comments']));
    }

    public function store(StoreRatingRequest $request)
    {
        $rating = Rating::create($request->validated());

        return response()->json(
            [
                'message' => 'Hodnotenie bolo úspšene vytvorené',
                'rating' => $rating
            ],
            201
        );
    }

    public function destroy(Rating $rating, Request $request, $code = null)
    {
        $code != null && $user = User::where('verification_code', $code)->firstOrFail();

        if ($code == null && $rating->user_ip != $request->ip()) {
            return response()->json('Nemáte oprávnenie vymazať hodnotenie', 403);
        } else if ($code != null && $rating->user_id != $user->id) {
            return response()->json('Nemáte oprávnenie vymazať hodnotenie', 403);
        }
        $rating->delete();

        return response()->json('Hodnotenie bolo úspšene odstránené', 201);
    }
}

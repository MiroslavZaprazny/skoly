<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\Rating\StoreRatingRequest;
use App\Http\Resources\Rating\ShowRatingResource;
use App\Models\User;
use App\Trait\Auth\AuthenticateUser;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    use AuthenticateUser;

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

    public function destroy(Rating $rating)
    {
        if ($this->authUser($rating->user_id)) {
            return response()->json('Nemáte oprávnenie vymazať hodnotenie', 403);
        }

        $rating->delete();

        return response()->json('Hodnotenie bolo úspšene odstránené', 201);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Http\Requests\StoreRatingRequest;

class RatingController extends Controller
{
    public function store(StoreRatingRequest $request)
    {
        Rating::create($request->validated());

        return response()->json('Hodnotenie bolo úspšene vytvorené');
    }
}

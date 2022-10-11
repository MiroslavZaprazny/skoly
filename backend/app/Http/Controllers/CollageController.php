<?php

namespace App\Http\Controllers;

use App\Http\Resources\CollagesResource;
use App\Http\Resources\ShowCollageResource;
use App\Models\Collage;
use Illuminate\Http\Request;

class CollageController extends Controller
{
    public function search(Request $request)
    {
        return CollagesResource::collection(Collage::with('ratings')->where(function ($query) use ($request) {
            $query->where('name', 'like', '%' . $request->input('search') . '%')
                ->orWhere('description', 'like', '%' . $request->input('search') . '%');
        })->get());
    }

    public function show(Collage $collage)
    {
        return new ShowCollageResource($collage->load(['ratings.user']));
    }
}

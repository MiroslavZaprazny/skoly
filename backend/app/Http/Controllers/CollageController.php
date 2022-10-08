<?php

namespace App\Http\Controllers;

use App\Http\Resources\CollagesResource;
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
}

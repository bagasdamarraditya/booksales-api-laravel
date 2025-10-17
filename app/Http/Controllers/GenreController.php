<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::getAllGenres();
        return response()->json([
            "success" => true,
            "message" => "Get All Authors",
            "data" => $genres
        ], 200);
    }
}

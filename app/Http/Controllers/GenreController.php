<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GenreController extends Controller
{
    // READ ALL
    public function index()
    {
        $genres = Genre::all();

        if ($genres->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found!"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $genres
        ], 200);
    }

    // CREATE
    public function store(Request $request)
    {
        // 1. Validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // 2. Check validator error
        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 400);
        }

        // 3. Insert data
        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        // 4. Response
        return response()->json([
            "success" => true,
            "message" => "Genre created successfully",
            "data" => $genre
        ], 201);
    }
}

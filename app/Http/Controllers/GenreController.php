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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 400);
        }

        $genre = Genre::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return response()->json([
            "success" => true,
            "message" => "Genre created successfully",
            "data" => $genre
        ], 201);
    }

    // SHOW
    public function show(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Genre not found!"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $genre
        ], 200);
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Genre not found!"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 400);
        }

        $genre->update([
            'name' => $request->name ?? $genre->name,
            'description' => $request->description ?? $genre->description
        ]);

        return response()->json([
            "success" => true,
            "message" => "Genre updated successfully",
            "data" => $genre
        ], 200);
    }

    // DESTROY
    public function destroy(string $id)
    {
        $genre = Genre::find($id);

        if (!$genre) {
            return response()->json([
                "success" => false,
                "message" => "Genre not found!"
            ], 404);
        }

        $genre->delete();

        return response()->json([
            "success" => true,
            "message" => "Genre deleted successfully"
        ], 200);
    }
}

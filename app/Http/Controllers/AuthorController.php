<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthorController extends Controller
{
    // READ ALL
    public function index()
    {
        $authors = Author::all();

        if ($authors->isEmpty()) {
            return response()->json([
                "success" => false,
                "message" => "Resource data not found!"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all resources",
            "data" => $authors
        ], 200);
    }

    // CREATE
public function store(Request $request)
{
    // 1. Validator
    $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        'bio' => 'nullable|string'
    ]);

    // 2. Check validator error
    if ($validator->fails()) {
        return response()->json([
            "success" => false,
            "message" => $validator->errors()
        ], 400);
    }

    // 3. Upload Image (jika ada)
    $photoName = null;
    if ($request->hasFile('photo')) {
        $photo = $request->file('photo');
        $photoName = time() . '_' . $photo->getClientOriginalName();
        $photo->move(public_path('images/authors'), $photoName);
    }

    // 4. Insert data
    $author = Author::create([
        'name' => $request->name,
        'photo' => $photoName, // simpan nama file hasil upload
        'bio' => $request->bio
    ]);

    // 5. Response
    return response()->json([
        "success" => true,
        "message" => "Author created successfully",
        "data" => $author
    ], 201);
}

}

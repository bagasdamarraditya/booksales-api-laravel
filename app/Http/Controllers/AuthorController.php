<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 400);
        }

        $photoName = null;
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('images/authors'), $photoName);
        }

        $author = Author::create([
            'name' => $request->name,
            'photo' => $photoName,
            'bio' => $request->bio
        ]);

        return response()->json([
            "success" => true,
            "message" => "Author created successfully",
            "data" => $author
        ], 201);
    }

    // SHOW
    public function show(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author not found!"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail resource",
            "data" => $author
        ], 200);
    }

    // UPDATE
    public function update(Request $request, string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author not found!"
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'bio' => 'nullable|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 400);
        }

        // Jika ada file foto baru
        if ($request->hasFile('photo')) {
            if ($author->photo && File::exists(public_path('images/authors/' . $author->photo))) {
                File::delete(public_path('images/authors/' . $author->photo));
            }

            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('images/authors'), $photoName);
            $author->photo = $photoName;
        }

        // Update data
        $author->update([
            'name' => $request->name ?? $author->name,
            'bio' => $request->bio ?? $author->bio,
            'photo' => $author->photo
        ]);

        return response()->json([
            "success" => true,
            "message" => "Author updated successfully",
            "data" => $author
        ], 200);
    }

    // DESTROY
    public function destroy(string $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json([
                "success" => false,
                "message" => "Author not found!"
            ], 404);
        }

        // Hapus foto jika ada
        if ($author->photo && File::exists(public_path('images/authors/' . $author->photo))) {
            File::delete(public_path('images/authors/' . $author->photo));
        }

        $author->delete();

        return response()->json([
            "success" => true,
            "message" => "Author deleted successfully"
        ], 200);
    }
}

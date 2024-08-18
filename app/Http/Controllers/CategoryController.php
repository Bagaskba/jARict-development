<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories);
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if (Auth::user()->role !== '1') {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $category = Category::create([
            'uuid' => Str::uuid()->toString(),
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($category, 201);
    }

    /**
     * Display the specified category.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function show($uuid)
    {
        $category = Category::where('uuid', $uuid)->first();

        if (!$category) {
            return response()->json(['message' => 'Category not found.'], 404);
        }

        return response()->json($category);
    }

    /**
     * Update the specified category in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $uuid)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        if (Auth::user()->role !== '1') {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $category = Category::where('uuid', $uuid)->first();

        if (!$category) {
            return response()->json(['message' => 'Category not found.'], 404);
        }

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return response()->json($category);
    }

    /**
     * Remove the specified category from storage.
     *
     * @param  string  $uuid
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid)
    {
        if (Auth::user()->role !== '1') {
            return response()->json(['message' => 'Unauthorized.'], 403);
        }

        $category = Category::where('uuid', $uuid)->first();

        if (!$category) {
            return response()->json(['message' => 'Category not found.'], 404);
        }

        $category->delete();

        return response()->json(['message' => 'Category deleted.']);
    }
}

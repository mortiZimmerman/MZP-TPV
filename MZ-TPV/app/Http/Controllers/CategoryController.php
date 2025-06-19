<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function store(Request $request)
{
    $request->validate(['name' => 'required|string|max:50']);
    $category = Category::create(['name' => $request->name]);
    return response()->json([
        'id' => $category->id,
        'name' => $category->name,
    ]);
}
}

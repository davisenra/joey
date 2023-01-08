<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category): CategoryResource
    {
        return new CategoryResource($category);
    }

    public function store(Request $request): CategoryResource
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'is_active' => 'boolean',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'is_active' => $request->is_active ?? true,
        ]);

        return new CategoryResource($category);
    }

    public function update(Category $category, Request $request): CategoryResource
    {
        $request->validate([
            'name' => 'string|min:3',
            'is_active' => 'boolean',
        ]);

        $category->update($request->only(['name', 'is_active']));

        return new CategoryResource($category);
    }

    public function destroy(Category $category): JsonResponse
    {
        $category->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}

<?php

namespace App\Http\Controllers\Label;

use App\Http\Controllers\Controller;
use App\Http\Resources\LabelResource;
use App\Models\Label;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Symfony\Component\HttpFoundation\Response;

class LabelController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return LabelResource::collection(Label::all());
    }

    public function show(Label $label): LabelResource
    {
        return new LabelResource($label);
    }

    public function store(Request $request): LabelResource
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'is_active' => 'boolean',
        ]);

        $label = Label::create([
            'name' => $request->name,
            'is_active' => $request->is_active ?? true,
        ]);

        return new LabelResource($label);
    }

    public function update(Label $label, Request $request): LabelResource
    {
        $request->validate([
            'name' => 'string|min:3',
            'is_active' => 'boolean',
        ]);

        $label->update($request->only(['name', 'is_active']));

        return new LabelResource($label);
    }

    public function destroy(Label $label): JsonResponse
    {
        $label->delete();

        return response()->json(status: Response::HTTP_NO_CONTENT);
    }
}

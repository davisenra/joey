<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{
    public function me(Request $request): mixed
    {
        return $request->user();
    }

    public function index(): AnonymousResourceCollection
    {
        return UserResource::collection(User::paginate(20));
    }

    public function show(User $user, string $tickets = null): UserResource
    {
        if ($tickets == 'tickets') {
            $user->loadMissing('tickets');
        }

        return new UserResource($user);
    }
}

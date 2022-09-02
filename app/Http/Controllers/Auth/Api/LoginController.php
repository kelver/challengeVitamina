<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MeResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        if (! auth()->attempt($credentials)) {
            abort(401, 'Invalid Credentials.');
        }

        $token = auth()->user()->createToken(auth()->user()->email);

        return response()
                ->json([
                    'data' => [
                        'token' => $token->plainTextToken,
                    ],
                ]);
    }

    public function me(): MeResource
    {
        $user = User::with('oportunities')->find(auth()->id());

        return new MeResource($user);
    }

    public function logout(): JsonResponse
    {
        auth()->user()->tokens()->delete();

        return response()->json([], 204);
    }
}

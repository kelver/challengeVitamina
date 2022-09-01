<?php

declare(strict_types=1);

namespace App\Http\Controllers\Auth\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function register(Request $request, User $user): JsonResponse
    {
        $request->validate([
            'password' => 'required|confirmed|min:6',
            'email' => 'required|string|email|max:255|unique:users',
        ]);

        $userData = $request->only('name', 'email', 'password');
        $userData['password'] = Hash::make($userData['password']);

        if (! $user = $user->create($userData)) {
            abort(403, 'Erro ao criar novo usuário.');
        }

        $credentials = [
            'email' => $user->email,
            'password' => $request->password,
        ];

        if (! auth()->attempt($credentials)) {
            abort(401, 'Credenciais inválidas.');
        }

        $token = auth()->user()->createToken($user->id);

        event(new Registered($user));

        return response()
            ->json([
                'data' => [
                    'token' => $token->plainTextToken,
                ],
            ]);
    }
}

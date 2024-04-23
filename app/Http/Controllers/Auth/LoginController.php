<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        dd($credentials);
        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            $user = Auth::user();
            return response()->json(['user' => $user, 'token' => $user->createToken('token-name')->plainTextToken]);
        }

        // Autenticación fallida
        return response()->json(['error' => 'Unauthorized'], 401);
    }
    public function logout(Request $request)
    {
        // Verificar si el usuario está autenticado
        if ($request->user()) {
            // Revocar el token de acceso actual del usuario
            $request->user()->currentAccessToken()->delete();
            return response()->json(['message' => 'Logged out']);
        }

        // Si el usuario no está autenticado, devolver un error 401
        return response()->json(['error' => 'Unauthorized'], 401);
    }
}

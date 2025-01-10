<?php

namespace App\Http\Controllers\Auth;

use App\Domain\Model\Usuario;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $credentials = $request->only('usuario', 'password');
        // if (! $token = auth('api')->attempt($credentials)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(['error' => 'Credenciales inválidas'], 401);
        }

        return response()->json(['token' => $token]);
    }
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Sesión cerrada correctamente']);
    }
    public function me()
    {
        return response()->json(JWTAuth::user());
    }
}

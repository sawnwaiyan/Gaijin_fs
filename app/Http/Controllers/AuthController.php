<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    function login() {
        $credentials = request(['email','password']);
        if(!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondwithToken($token);
    }

    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'Logged out']);
    }

    public function me() {
        return response()->json(auth()->user());
    }

    protected function respondWithToken($token) {
        return response()->json([
            'access-token' => $token,
            'token-type' => 'bearer',
            'expires_in' => auth("api")->factory()->getTTL() * 60
        ]);
    }
}

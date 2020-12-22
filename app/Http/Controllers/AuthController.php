<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use Auth;
use App\User;

class AuthController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $request->headers->set('Accept', 'application/json');

            return $next($request);
        });
    }

    function login(Request $request) {
        $credentials = request(['email','password']);
        // if(!$token = auth('api')->attempt($credentials)) {
        //     return response()->json(['error' => 'Unauthorized'], 401);
        // }
        // return $this->respondwithToken($token);

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    public function logout() {
        auth()->logout();
        return response()->json(['message' => 'Logged out']);
    }

    public function me() {
        // return response()->json(['message' => 'Logged out']);
        // $user = auth()->user();
        // $users = User::All();
        $user = Auth::user();
        return response()->json($user);
    }

    protected function respondWithToken($token) {
        // return response()->json([
        //     'access-token' => $token,
        //     'token-type' => 'bearer',
        //     'expires_in' => auth("api")->factory()->getTTL() * 60
        // ]);
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    public function guard()
    {
        return Auth::guard();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function authentication(Request $request) {
        if ($request->grant_type != "Password") {
            return response()->json(["message" => "Grant type inválido!"], 400);
        } 

        $credentials = [
            "client_id" => $request->client_id,
            'password' => $request->client_secret
        ];

        if (!$token = JWTAuth::attempt($credentials)) {
            return response()->json(["message" => "Credenciais inválidas."], 401);
        }

        return response()->json(["access_token" => $token], 200);
    }
}

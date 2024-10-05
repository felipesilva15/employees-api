<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthenticationRequest;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * @OA\Get(
     *      path="/api/REST/API.APDATA.V1/AUTH",
     *      tags={"Auth"},
     *      summary="Authenticate",
     *      @OA\Parameter(
     *         name="grant_type",
     *         in="query",
     *         description="Grant Type",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="client_id",
     *         in="query",
     *         description="Client ID",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="client_secret",
     *         in="query",
     *         description="Client Secret",
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response="200", 
     *          description="Access token",
     *          @OA\JsonContent(
     *             type="object",
     *             @OA\Property(property="access_token", type="string", example="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL1JFU1QvQVBJLkFQREFUQS5WMS9BVVRIIiwiaWF0IjoxNzI4MDYzNTg3LCJleHAiOjE3MjgwNjcxODcsIm5iZiI6MTcyODA2MzU4NywianRpIjoiTlVCaVpWbDhQalJWRzFTdiIsInN1YiI6IjEiLCJwcnYiOiIxMTU1YTk0ZjVhMzE0MTIwYzQ2NzlmNzA4OGQ5MTFiMDZhZTlmYjU5In0.hVgAu-mkfvYILYGmJHgrsMY6JmLUZuhaTa9yNLNDyP8")
     *         )
     *      ),
     *      @OA\Response(
     *          response="401",
     *          description="Unauthorized",
     *          @OA\JsonContent(ref="#/components/schemas/ApiErrorDTO")
     *      )
     * )
     */
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

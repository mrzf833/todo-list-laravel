<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request, UserService $userService)
    {
        $token = $userService->login($request->all());

        return response()->json($token);
    }

    public function user(UserService $userService)
    {
        return $userService->user();
    }
}

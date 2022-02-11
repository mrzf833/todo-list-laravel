<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class UserService
{
    protected $user;

    public function login($data) : array
    {
        $credentials = Arr::only($data, ['email', 'password']);
        if (!Auth::attempt($credentials))
        {            
            throw abort(422, 'The provided credentials do not match our records.');
        }

        $user = Auth::user();
        $this->deleteAllToken($user);

        $token = $this->createToken($user);

        return [
            'user' => $user,
            'token' => $token
        ];
    }

    public function createToken(User $user) : string
    {
        $token = $user->createToken('auth_token')->plainTextToken;
        return $token;
    }

    public function deleteAllToken(User $user) : void
    {
        $user->tokens()->delete();
    }

    public function user() : User
    {
        return Auth::user();
    }
}
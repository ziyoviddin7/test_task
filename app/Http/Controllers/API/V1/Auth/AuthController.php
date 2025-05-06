<?php

namespace App\Http\Controllers\API\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\ApiLoginRequest;
use App\Http\Requests\API\V1\ApiRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(ApiRegisterRequest $request)
    {
        $user = User::create($request->all());

        $api_token = hash('sha256', $user->id . $user->email . $user->password);

        $user->api_token = $api_token;
        $user->save();

        return $user;
    }

    public function login(ApiLoginRequest $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => 'Неверный адрес электронной почты или пароль!'
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'api_token' => $user->api_token,
            'user' => $user,
        ]);
    }
}

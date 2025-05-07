<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    public function store(RegisterRequest $registerStoreRequest)
    {
        $registerStoreRequest->validated();

        $user = User::create([
            'name' => $registerStoreRequest->name,
            'email' => $registerStoreRequest->email,
            'password' => $registerStoreRequest->password,
        ]);

        $api_token = hash('sha256', $user->id . $user->email . $user->password);

        $user->api_token = $api_token;
        $user->save();

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

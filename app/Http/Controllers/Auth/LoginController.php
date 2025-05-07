<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        return view('auth.login');
    }

    public function store(LoginRequest $loginStoreRequest)
    {
        $credentials = $loginStoreRequest->validated();

        if (Auth::attempt($credentials)) {

            $loginStoreRequest->session()->regenerate();

            return redirect()->intended(RouteServiceProvider::HOME);
        }
        return back()
            ->withInput()
            ->withErrors([
                'email' => 'These data do not match our records.'
            ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}

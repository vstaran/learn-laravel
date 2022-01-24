<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Форма для авторизации
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Авторизация пользователя
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function auth(Request $request)
    {
        $request->validate(
            [
               'email' => 'required|email',
               'password' => 'required',
            ]
        );

        $remember_me = $request->has('remember');

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $remember_me)) {
            return redirect(RouteServiceProvider::HOME);
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }

    /**
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }

}

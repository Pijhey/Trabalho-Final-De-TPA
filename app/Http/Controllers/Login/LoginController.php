<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\Login\LoginValidator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    /**
     * Método da rota de Login.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function view(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('login.login');
    }

    /**
     * Método POST da rota de login.
     *
     * Implementa o Login do Laravel.
     *
     * @param LoginValidator $request
     * @return RedirectResponse
     */
    public function login(LoginValidator $request): RedirectResponse
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {

            return redirect()->route('home')->with([
                'success' => __('Logado com sucesso!')
            ]);
        }

        return back()->withErrors([
            'email' => __('As credenciais enviadas não constam nos nossos registros.')
        ]);
    }

    /**
     * Define a rota de Logout.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();

        return redirect()->route('home');
    }
}

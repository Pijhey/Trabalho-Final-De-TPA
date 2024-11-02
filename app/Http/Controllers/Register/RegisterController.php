<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\RegisterValidator;
use App\Models\Customer;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    /**
     * Carrega a view de Registro.
     *
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function view(): Factory|View|\Illuminate\Foundation\Application|Application
    {
        return view('register.register');
    }

    /**
     * Registra um novo usuário.
     *
     * @param RegisterValidator $request
     * @return RedirectResponse
     */
    public function register(RegisterValidator $request): RedirectResponse
    {
        try {

            $data = $request->validated();

            Customer::query()->create([
                'Name' => $data['name'],
                'Email' => $data['email'],
                'Password' => Hash::make($data['password']),
                'Cellphone' => $data['phone'],
            ]);

            return redirect()->route('home')->with([
                'success' => __('Registrado com sucesso!')
            ]);
        } catch (\Throwable $throwable) {

            Log::error($throwable);

            return redirect()->route('home')->with([
                'error' => __('Um erro inesperado aconteceu!')
            ]);
        }
    }
}

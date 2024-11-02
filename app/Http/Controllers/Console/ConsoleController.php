<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Http\Requests\Console\ConsoleValidator;
use App\Models\Brand;
use App\Models\Console;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class ConsoleController extends Controller
{
    /**
     * Carrega a tela com todos os consoles.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function view(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $consoles = Console::all();

        return view('consoles.view', [
            'consoles' => $consoles
        ]);
    }

    /**
     * Carrega a tela de criação de console.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $brands = Brand::all();

        return view('consoles.create', [
            'brands' => $brands
        ]);
    }

    /**
     * Cria um novo Console.
     *
     * @param ConsoleValidator $request
     * @return RedirectResponse
     */
    public function store(ConsoleValidator $request): RedirectResponse
    {
        try {

            $data = $request->validated();

            Console::query()->create([
                'Model' => $data['model'],
                'idBrand' => $data['brand'],
                'Price' => $data['price'],
            ]);

            return redirect()->route('console.view')->with([
                'success' => __('Console criado com sucesso!')
            ]);
        } catch (\Throwable $throwable) {

            Log::error($throwable);

            return redirect()->route('console.view')->with([
                'error' => __('Um erro inesperado aconteceu!')
            ]);
        }
    }

    /**
     * Carrega a tela de edição.
     *
     * @param int $id
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function edit(int $id): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $console = Console::query()->findOrFail($id);

        $brands = Brand::all();

        return view('consoles.edit', [
            'console' => $console,
            'brands' => $brands
        ]);
    }

    /**
     * Atualiza um Console no Banco de Dados.
     *
     * @param int $id
     * @param ConsoleValidator $request
     * @return RedirectResponse
     */
    public function update(int $id, ConsoleValidator $request): RedirectResponse
    {
        try {

            $console = Console::query()->findOrFail($id);

            $data = $request->validated();

            $console->update([
                'Model' => $data['model'],
                'idBrand' => $data['brand'],
                'Price' => $data['price'],
            ]);

            return redirect()->route('console.view')->with([
                'success' => __('Console atualizado com sucesso!')
            ]);
        } catch (\Throwable $t) {

            Log::error($t);

            return redirect()->route('console.edit', $id)->with([
                'error' => __('Um erro inesperado aconteceu!')
            ]);
        }
    }

    /**
     * Rota de deletar os consoles.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        try {

            Console::query()->where('idConsole', $id)->delete();

            return redirect()->route('console.view')->with([
                'success' => __('Console apagado com sucesso.')
            ]);
        } catch (\Throwable $t) {

            Log::error($t);

            return redirect()->route('console.view')->with([
                'error' => __('Um erro inesperado aconteceu!')
            ]);
        }
    }
}

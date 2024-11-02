<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\BrandValidator;
use App\Models\Brand;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class BrandController extends Controller
{
    /**
     * Carrega a tela com todos os brands.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function view(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $brands = Brand::all();

        return view('brands.view', [
            'brands' => $brands
        ]);
    }

    /**
     * Carrega a tela de criação de brand.
     *
     * @return View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     */
    public function create(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $brands = Brand::all();

        return view('brands.create', [
            'brands' => $brands
        ]);
    }

    /**
     * Cria um novo brand.
     *
     * @param BrandValidator $request
     * @return RedirectResponse
     */
    public function store(BrandValidator $request): RedirectResponse
    {
        try {

            $data = $request->validated();

            Brand::query()->create([
                'Name' => $data['name']
            ]);

            return redirect()->route('brand.view')->with([
                'success' => __('Marca criada com sucesso!')
            ]);
        } catch (\Throwable $throwable) {

            Log::error($throwable);

            return redirect()->route('brand.view')->with([
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
        $brand = Brand::query()->findOrFail($id);

        return view('brands.edit', [
            'brand' => $brand
        ]);
    }

    /**
     * Atualiza uma marca no Banco de Dados.
     *
     * @param int $id
     * @param BrandValidator $request
     * @return RedirectResponse
     */
    public function update(int $id, BrandValidator $request): RedirectResponse
    {
        try {

            $brand = Brand::query()->findOrFail($id);

            $data = $request->validated();

            $brand->update([
                'Name' => $data['name'],
            ]);

            return redirect()->route('brand.view')->with([
                'success' => __('brands atualizado com sucesso!')
            ]);
        } catch (\Throwable $t) {

            Log::error($t);

            return redirect()->route('brand.edit', $id)->with([
                'error' => __('Um erro inesperado aconteceu!')
            ]);
        }
    }

    /**
     * Rota de deletar as marcas.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        try {

            Brand::query()->where('idBrand', $id)->delete();

            return redirect()->route('brand.view')->with([
                'success' => __('Marca apagado com sucesso.')
            ]);
        } catch (\Throwable $t) {

            Log::error($t);

            return redirect()->route('brand.view')->with([
                'error' => __('Um erro inesperado aconteceu!')
            ]);
        }
    }
}

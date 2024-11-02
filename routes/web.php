<?php

use App\Http\Controllers\Brand\BrandController;
use App\Http\Controllers\Console\ConsoleController;
use App\Http\Controllers\Login\LoginController;
use App\Http\Controllers\Register\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})
    ->name('home');

Route::prefix('/login')->controller(LoginController::class)->group(function () {

    Route::middleware('guest')->group(function () {

        Route::get('/', 'view')->name('login.view');

        Route::post('/', 'login')->name('login');
    });

    Route::middleware('auth')->group(function () {

        Route::get('/logout', 'logout')->name('logout');
    });
});

Route::prefix('/register')->controller(RegisterController::class)->group(function () {

    Route::middleware('guest')->group(function () {

        Route::get('/', 'view')->name('register.view');

        Route::post('/', 'register')->name('register');
    });
});

Route::prefix('/consoles')->controller(ConsoleController::class)->group(function () {

    Route::get('/', 'view')->name('console.view');

    Route::middleware('auth')->group(function () {

        Route::get('/create', 'create')->name('console.create');

        Route::post('/store', 'store')->name('console.store');

        Route::get('/edit/{id}', 'edit')->name('console.edit');

        Route::put('/edit/{id}', 'update')->name('console.update');

        Route::delete('/delete/{id}', 'delete')->name('console.destroy');
    });
});

Route::prefix('/brands')->controller(BrandController::class)->group(function () {

    Route::get('/', 'view')->name('brand.view');

    Route::middleware('auth')->group(function () {

        Route::get('/create', 'create')->name('brand.create');

        Route::post('/store', 'store')->name('brand.store');

        Route::get('/edit/{id}', 'edit')->name('brand.edit');

        Route::put('/edit/{id}', 'update')->name('brand.update');

        Route::delete('/delete/{id}', 'delete')->name('brand.destroy');
    });
});

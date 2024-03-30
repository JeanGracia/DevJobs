<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\VacanteController;

// indica que al acceder a la raíz de la aplicación, se ejecutará el método __invoke del controlador HomeController.
Route::get('/', HomeController::class)->name('home');

// define un grupo de rutas que están agrupadas bajo el prefijo 'vacantes' y que utilizan el middleware de autenticación y verificación. Además, estas rutas están asociadas al controlador VacanteController.
Route::middleware(['auth', 'verified'])->controller(VacanteController::class)->prefix('vacantes')->group(function () {
    Route::get('/dashboard', 'index')->name('vacantes.index');
    Route::get('/create', 'create')->name('vacantes.create');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
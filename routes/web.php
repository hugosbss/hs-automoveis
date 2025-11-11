<?php

use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() {
    $veiculos = \App\Models\Veiculo::with(['marca', 'modelo', 'cor', 'fotos'])->get();
    return view('template-wmotors.pages.home', compact('veiculos'));
})->name('home');
Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
Route::get('/veiculos/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show');

Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [VeiculoController::class, 'adminIndex'])->name('veiculos');
    
    Route::middleware(['auth'])->group(function () {
        Route::get('/veiculos/{veiculo}', [VeiculoController::class, 'getVeiculoJson'])->name('veiculos.get');
        Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');
        Route::put('/veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
        Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');
        
        Route::get('/marcas', [MarcaController::class, 'index'])->name('marcas.index');
        Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
        Route::put('/marcas/{marca}', [MarcaController::class, 'update'])->name('marcas.update');
        Route::delete('/marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');
        
        Route::get('/modelos', [ModeloController::class, 'index'])->name('modelos.index');
        Route::post('/modelos', [ModeloController::class, 'store'])->name('modelos.store');
        Route::put('/modelos/{modelo}', [ModeloController::class, 'update'])->name('modelos.update');
        Route::delete('/modelos/{modelo}', [ModeloController::class, 'destroy'])->name('modelos.destroy');
        
        Route::get('/cores', [CorController::class, 'index'])->name('cores.index');
        Route::post('/cores', [CorController::class, 'store'])->name('cores.store');
        Route::put('/cores/{cor}', [CorController::class, 'update'])->name('cores.update');
        Route::delete('/cores/{cor}', [CorController::class, 'destroy'])->name('cores.destroy');
    });
});

require __DIR__.'/auth.php';

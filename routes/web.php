<?php

use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Http\Controllers\CorController;
use App\Http\Controllers\FotoVeiculoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function() { $veiculos = \App\Models\Veiculo::with(['marca', 'modelo', 'cor', 'fotos'])->get();
    return view('template-wmotors.pages.home', compact('veiculos'));
})->name('home');
Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
Route::get('/veiculos/{veiculo}', [VeiculoController::class, 'show'])->name('veiculos.show');

Route::get('/quem-somos', function() { 
    return view('sobre.quem_somos');
})->name('quem-somos');
Route::get('blog', function() {
    return view('sobre.blog');
})->name('blog-index');
Route::get('contato', function() {
    return view('sobre.contato');
})->name('contato');

Route::get('/como-comprar', function() {
    return view('comprador.como_comprar');
})->name('como-comprar');
Route::get('/financiamento', function() {
    return view('comprador.financiamento');
})->name('financiamento');
Route::get('/seguro', function() {
    return view('comprador.seguro');
})->name('seguro');

Route::get('/vender-carro', function() {
    return view('vendedor.vender_carro');
})->name('vender-carro');
Route::get('/minhas-vendas', function() {
    return view('vendedor.minhas_vendas');
})->name('minhas-vendas');
Route::get('/duvidas', function() {
    return view('vendedor.duvidas');
})->name('duvidas');

Route::get('/criar', [RegisteredUserController::class, 'create'])->name('perfil.criar');
Route::post('/perfil', [RegisteredUserController::class, 'store'])->name('perfil.store');

Route::middleware('auth')->group(function () {
    Route::get('/perfil/{id}', [ProfileController::class, 'show'])->name('perfil.show');
    Route::get('/editar/perfil/{id}', [ProfileController::class, 'edit'])->name('perfil.index');
    Route::get('/editar/perfil', [ProfileController::class, 'edit'])->name('perfil.editar');
    Route::patch('/editar/perfil', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/editar/perfil', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [VeiculoController::class, 'adminIndex'])->name('veiculos');
    Route::middleware(['auth'])->group(function () {
        Route::get('/veiculos/criar', [VeiculoController::class, 'create'])->name('veiculos.criar');
        Route::get('/veiculos/{veiculo}/editar', [VeiculoController::class, 'edit'])->name('veiculos.editar');
        Route::post('/veiculos', [VeiculoController::class, 'store'])->name('veiculos.store');
        Route::put('/veiculos/{veiculo}', [VeiculoController::class, 'update'])->name('veiculos.update');
        Route::delete('/veiculos/{veiculo}', [VeiculoController::class, 'destroy'])->name('veiculos.destroy');
        
        Route::get('/marcas/{marca}/editar', [MarcaController::class, 'edit'])->name('marcas.editar');
        Route::post('/marcas', [MarcaController::class, 'store'])->name('marcas.store');
        Route::put('/marcas/{marca}', [MarcaController::class, 'update'])->name('marcas.update');
        Route::delete('/marcas/{marca}', [MarcaController::class, 'destroy'])->name('marcas.destroy');
        
        Route::get('/modelos/{modelo}/editar', [ModeloController::class, 'edit'])->name('modelos.editar');
        Route::post('/modelos', [ModeloController::class, 'store'])->name('modelos.store');
        Route::put('/modelos/{modelo}', [ModeloController::class, 'update'])->name('modelos.update');
        Route::delete('/modelos/{modelo}', [ModeloController::class, 'destroy'])->name('modelos.destroy');
        
        Route::get('/cores/{cor}/editar', [CorController::class, 'edit'])->name('cores.editar');
        Route::post('/cores', [CorController::class, 'store'])->name('cores.store');
        Route::put('/cores/{cor}', [CorController::class, 'update'])->name('cores.update');
        Route::delete('/cores/{cor}', [CorController::class, 'destroy'])->name('cores.destroy');

        Route::get('/fotoVeiculo/{fotoVeiculo}/editar', [FotoVeiculoController::class, 'edit'])->name('fotoVeiculo.editar');
        Route::post('/fotoVeiculo', [FotoVeiculoController::class, 'store'])->name('fotoVeiculo.store');
        Route::put('/fotoVeiculo/{fotoVeiculo}', [FotoVeiculoController::class, 'update'])->name('fotoVeiculo.update');
        Route::delete('/fotoVeiculo/{fotoVeiculo}', [FotoVeiculoController::class, 'destroy'])->name('fotoVeiculo.destroy');
    });
});

require __DIR__.'/auth.php';

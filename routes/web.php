<?php

use App\Http\Controllers\VeiculoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('template-wmotors.pages.home');
});

Route::get('admin/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotas do template wmotors
Route::view('/home', 'template-wmotors.pages.home')->name('wmotors.home');
Route::view('/veiculos', 'template-wmotors.pages.veiculoLista')->name('wmotors.veiculos');
// Route::view('/detalhe/{veiculo}', 'template-wmotors.pages.veiculoDetalhe')->name('wmotors.veiculoDetalhe');
Route::view('/admin' , 'template-wmotors.pages.administrador')->name('wmotors.admin');


// Route::get('/veiculos', [VeiculoController::class, 'index'])->name('veiculos.index');
// Route::get('/veiculos/{id}', [VeiculoController::class, 'show'])->name('veiculos.show');


// Route::middleware(['auth', 'admin'])->group(function () {
//     Route::get('/admin', [VeiculoController::class, 'index'])->name('admin.dashboard');
// });


require __DIR__.'/auth.php';

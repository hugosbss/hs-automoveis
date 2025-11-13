<?php 

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [App\Http\Controllers\Auth\Admin::class, 'dashboard'])->name('admin.dashboard');
});
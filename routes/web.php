<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/tatto', function () {
    return view('tatto');
})->middleware(['auth', 'verified'])->name('tatto');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/aboutus', function (){
    return view('about-us');
})->name('aboutus');
use App\Http\Controllers\Admin\UserController;


Route::prefix('admin')->middleware(['auth'])->group(function () {
    // Rota para listar os usuários com nome 'admin.usuarios'
    Route::get('/usuarios', [UserController::class, 'index'])->name('admin.usuarios');

    // Rota para atualizar um usuário
    Route::put('/usuarios/{id}', [UserController::class, 'update']);
});


require __DIR__.'/auth.php';

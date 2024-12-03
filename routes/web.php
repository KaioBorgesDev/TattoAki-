<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TatuagemController;

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
    Route::get('/usuarios', [UserController::class, 'index'])->name('admin.users.index');
    Route::put('/usuarios/{id}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/usuarios/{id}', [UserController::class, 'destroy'])->name('admin.users.delete'); 
});



Route::get('/agendar-tatuagem', [TatuagemController::class, 'create'])->name('agendar.tatuagem.form');

Route::post('/agendar-tatuagem', [TatuagemController::class, 'store'])->name('agendar.tatuagem');

require __DIR__.'/auth.php';
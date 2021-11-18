<?php

use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::resource('links', LinkController::class);

    Route::get('settings', [UserController::class, 'edit'])->name('user.edit');
    Route::put('settings', [UserController::class, 'update'])->name('user.update');

});

require __DIR__.'/auth.php';

Route::post('/visits/{link}', VisitController::class);

Route::get('/{user:username}', [UserController::class, 'index'])->name('user.show');
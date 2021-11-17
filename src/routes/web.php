<?php

use App\Http\Controllers\LinkController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::resource('links', LinkController::class);
});


require __DIR__.'/auth.php';

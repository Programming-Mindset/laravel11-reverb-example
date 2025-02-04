<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/fire-event', function () {
    event(new \App\Events\MessageCreate([
        'title' => 'hi there',
        'message' => 'this is a test message ' . fake()->randomDigit(),
    ]));
});

Route::match(['get', 'post'],'create', [\App\Http\Controllers\MessageController::class,'create'])->name('create.message');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [\App\Http\Controllers\HomeController::class, 'dashboard'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

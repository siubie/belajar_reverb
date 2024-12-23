<?php

use App\Events\PackageSent;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    broadcast(new PackageSent('delivered', 'UPS'));
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

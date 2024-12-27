<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('news/show/{item}', [HomeController::class, 'show'])->name('news.show');

<?php

use App\Http\Controllers\Panel\HomeController;
use App\Http\Controllers\Panel\NewsController;
use App\Http\Controllers\Panel\ProfileController;
use App\Http\Controllers\Panel\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Panel\PanelController;
use App\Http\Controllers\Panel\LoginController;
use App\Http\Controllers\Panel\CategoryController;

Route::group(['middleware' => 'guest:panel', 'prefix' => 'panel'], function () {
	Route::get('login', [LoginController::class, 'create'])->name('panel.create');
	Route::post('login', [LoginController::class, 'store'])->name('panel.login');
    Route::get('register', [LoginController::class, 'registerPage'])->name('panel.register.page');
    Route::post('register', [LoginController::class, 'storeRegistration'])->name('panel.register.store');
});

Route::prefix('panel')->name('panel.')->middleware('auth:panel')->group(function () {
	Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
	Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::post('profile/update', [ProfileController::class, 'update'])->name('profile.update');

	Route::get('', [PanelController::class, 'index'])->name('home');

	Route::resource('news', NewsController::class)->except('show');
	Route::resource('users', UserController::class)->except('show');
});

<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

Route::get('/', JobController::class . '@index')->name('jobs.index');
Route::get('/jobs/create', JobController::class . '@create')->middleware('auth')->name('jobs.create');
Route::post('/jobs', JobController::class . '@store')->middleware('auth')->name('jobs.store');
Route::get('/jobs/{job}', JobController::class . '@show')->name('jobs.show');
Route::get('/jobs/{job}/edit', JobController::class .'@edit')->middleware('auth')->name('jobs.edit');
Route::delete('/jobs/{job}', JobController::class . '@destroy')->middleware('auth');

Route::middleware('guest')->group(function () {
    Route::get('/register',RegisteredUserController::class . '@create')->name('register');
    Route::post('/register',RegisteredUserController::class . '@store');
    Route::get('/login',SessionController::class . '@create')->name('login');
    Route::post('/login',SessionController::class . '@store');
});





Route::get('/search', SearchController::class )->name('jobs.search');
Route::get('/tags/{tag:name}', TagController::class );
Route::delete('/logout',SessionController::class . '@destroy')->middleware('auth')->name('logout');

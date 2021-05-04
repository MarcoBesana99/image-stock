<?php

use App\Http\Controllers\MyFavoriteImagesController;
use App\Http\Controllers\MyImagesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/my-images', [MyImagesController::class, 'index'])
        ->name('my-images');

    Route::get('/my-favorites', [MyFavoriteImagesController::class, 'index'])
        ->name('my-favorites');
});

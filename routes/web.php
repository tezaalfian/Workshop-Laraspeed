<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\LandingController::class, 'landing'])->name('landing');

Route::post('/subscribe-submit', [App\Http\Controllers\LandingController::class, 'index'])->name('submit.subscribe');

Route::get('/blog/{slug}', [App\Http\Controllers\LandingController::class, 'detail_blog'])->name('blog.detail');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserResourceController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PostController;

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
Auth::routes();
Route::get('/', function () {
    return view('welcome');
});

Route::resource('user', UserResourceController::class);
Route::get('login', [HomeController::class, 'login'])->name('home.login');
Route::post('login', [HomeController::class, 'loginPost']);
Route::get('logout', [HomeController::class, 'logout'])->name('home.logout');
Route::resource('post', PostController::class);
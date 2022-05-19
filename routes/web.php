<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstagramController;
use App\Http\Controllers\TwitterController;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('asset', [AssetController::class,'index'])->name('asset');

Route::get('instagram', [InstagramController::class,'index'])->name('instagram');

Route::get('twitter', [TwitterController::class,'index'])->name('twitter');

Route::get('expense', [ExpenseController::class,'index'])->name('expense');
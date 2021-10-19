<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
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
    return redirect()->route('get.category');
});

Route::get('category/{id?}',[CategoryController::class,"manageCategory"])->name('get.category');

//auth
Route::middleware(['auth'])->group(function (){
    Route::post('category/{id?}',[CategoryController::class,"addCategory"])->name('add.category');
    Route::get('category/edit/{id}',[CategoryController::class,"editCategory"])->name('edit.view');
    Route::put('category/edit/{id}',[CategoryController::class,"updateCategory"])->name('edit.category');
    Route::delete('category/{id}',[CategoryController::class,"removeCategory"])->name('delete.category');
});

Auth::routes();
Route::get('register', [RegisterController::class,'showRegistrationForm'])->name('register')->middleware('auth');
Route::get('register', [RegisterController::class,'register'])->middleware('auth');

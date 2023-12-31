<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

Route::get('/', [ImageController::class,'index']);
Route::post('/upload', [ImageController::class,'upload']);
Route::get('/images', [ImageController::class,'showImages']);
Route::delete('/images/{id}', [ImageController::class,'delete']);


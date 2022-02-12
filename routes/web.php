<?php

use Illuminate\Support\Facades\Route;
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


Route::get('/', [PostController::class, 'index'])->name('listposts');



Route::get('/create', [PostController::class, 'create'])->name('createpost');
Route::post('/store', [PostController::class, 'store'])->name('storepost');
Route::delete('/destroy/{id}', [PostController::class, 'destroy'])->name('destroypost');


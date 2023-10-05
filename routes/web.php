<?php

use App\Http\Controllers\Web\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/forum/post/{id}', [WebController::class, 'show'])->name('web.show');
Route::put('/forum/post/update/{id}', [WebController::class, 'update'])->name('web.update');
Route::delete('/forum/post/delete/{id}', [WebController::class, 'delete'])->name('web.delete');
Route::get('/forum/post/{id}/edit', [WebController::class, 'edit'])->name('web.edit');
Route::post('/forum', [WebController::class, 'store'])->name('web.store');
Route::get('/forum/create', [WebController::class, 'create'])->name('web.create');
Route::get('/forum', [WebController::class, 'index'])->name('web.index');


/* Route::get('/', function () {
    return view('welcome');
}); */

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AjaxBookController;

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
Route::get('/jshow', function () {
    return view('js');
});

Route::get('/books', [BookController::class, 'index']);
Route::get('/book',[AjaxBookController::class,'index'])->name('book.index');
Route::get('/book/create',[AjaxBookController::class,'create'])->name('book.create');
Route::post('/book',[AjaxBookController::class,'store'])->name('book.store');
Route::get('/book/{id}/edit',[AjaxBookController::class,'edit'])->name('book.edit');
Route::post('/book/{id}/update',[AjaxBookController::class,'update'])->name('book.update');
Route::delete('/book/{id}/delete',[AjaxBookController::class,'destroy'])->name('book.destroy');

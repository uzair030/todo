<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/todos', [App\Http\Controllers\TodoController::class, 'index'])->name('todo.index');
Route::get('/todo/create/', [App\Http\Controllers\TodoController::class, 'create'])->name('todo.create');
Route::post('/todo/store', [App\Http\Controllers\TodoController::class, 'store'])->name('todo.store');
Route::get('/todo/delete/{id}',[App\Http\Controllers\TodoController::class, 'delete'])->name('todo.delete');
Route::get('/todo/edit/{id}',[App\Http\Controllers\TodoController::class, 'edit'])->name('todo.edit');
Route::put('/todo/update/{id}',[App\Http\Controllers\TodoController::class, 'update'])->name('todo.update');



Route::get('/pet', [App\Http\Controllers\PetController::class, 'index'])->name('pet.index');
Route::get('/pet/create/', [App\Http\Controllers\PetController::class, 'create'])->name('pet.create');
Route::post('/pet/store', [App\Http\Controllers\PetController::class, 'store'])->name('pet.store');
Route::get('/pet/delete/{id}', [App\Http\Controllers\PetController::class, 'delete'])->name('pet.delete');
Route::get('/pet/edit/{id}',[App\Http\Controllers\PetController::class, 'edit'])->name('pet.edit');
Route::put('/pet/update/{id}',[App\Http\Controllers\PetController::class, 'update'])->name('pet.update');



Route::get('/product', [App\Http\Controllers\ProController::class, 'index'])->name('pro.index');
Route::get('/product/create/', [App\Http\Controllers\ProController::class, 'create'])->name('pro.create');
Route::post('/product/store', [App\Http\Controllers\ProController::class, 'store'])->name('pro.store');
Route::get('/products/delete/{id}', [App\Http\Controllers\ProController::class, 'delete'])->name('pro.delete');
Route::get('/product/edit/{id}',[App\Http\Controllers\ProController::class, 'edit'])->name('pro.edit');
Route::put('/product/update/{id}',[App\Http\Controllers\ProController::class, 'update'])->name('pro.update');



Route::get('/notes', [App\Http\Controllers\NoteController::class, 'index'])->name('note.index');
Route::get('/note/create/', [App\Http\Controllers\NoteController::class, 'create'])->name('note.create');
Route::post('/note/store', [App\Http\Controllers\NoteController::class, 'store'])->name('note.store');
Route::get('/notes/delete/{id}', [App\Http\Controllers\NoteController::class, 'delete'])->name('note.delete');
Route::get('/note/edit/{id}',[App\Http\Controllers\NoteController::class, 'edit'])->name('note.edit');
Route::put('/note/update/{id}',[App\Http\Controllers\NoteController::class, 'update'])->name('note.update');
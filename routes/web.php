<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use Auth;

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

Route::middleware(['auth'])->group(function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::controller(TodoController::class)->group(function () {
        Route::get('/todos',  'index')->name('todo.index');
        Route::get('/todo/create/',  'create')->name('todo.create');
        Route::post('/todo/store',  'store')->name('todo.store');
        Route::get('/todo/delete/{id}', 'delete')->name('todo.delete');
        Route::get('/todo/edit/{id}', 'edit')->name('todo.edit');
        Route::put('/todo/update/{id}', 'update')->name('todo.update');
    });
    
    
    
    Route::controller(PetController::class)->group(function () {

        Route::get('/pet', 'index')->name('pet.index');
        Route::get('/pet/create/',  'create')->name('pet.create');
        Route::post('/pet/store', 'store')->name('pet.store');
        Route::get('/pet/delete/{id}',  'delete')->name('pet.delete');
        Route::get('/pet/edit/{id}', 'edit')->name('pet.edit');
        Route::put('/pet/update/{id}', 'update')->name('pet.update');
    });
  
    
    
    Route::controller(ProController::class)->group(function(){
        Route::get('/product',  'index')->name('pro.index');
        Route::get('/product/create/',  'create')->name('pro.create');
        Route::post('/product/store',  'store')->name('pro.store');
        Route::get('/products/delete/{id}',  'delete')->name('pro.delete');
        Route::get('/product/edit/{id}', 'edit')->name('pro.edit');
        Route::put('/product/update/{id}', 'update')->name('pro.update');

    });
   
    
    
    Route::controller(NoteController::class)->group(function(){
        Route::get('/notes',  'index')->name('note.index');
        Route::get('/note/create/',  'create')->name('note.create');
        Route::post('/note/store',  'store')->name('note.store');
        Route::get('/notes/delete/{id}',  'delete')->name('note.delete');
        Route::get('/note/edit/{id}', 'edit')->name('note.edit');
        Route::put('/note/update/{id}', 'update')->name('note.update');
    });
   
    
    
    Route::controller(MovieController::class)->group(function(){
        Route::get('/movies',  'index')->name('movie.index');
        Route::get('/movie/create/',  'create')->name('movie.create');
        Route::post('/movie/store',  'store')->name('movie.store');
        Route::get('/movie/delete/{id}',  'delete')->name('movie.delete');
        Route::get('/movie/edit/{id}', 'edit')->name('movie.edit');
        Route::put('/movie/update/{id}', 'update')->name('movie.update');

    });


  
    
    Route::controller(TouristController::class)->group(function(){
    
        Route::get('/tours',  'index')->name('tour.index');
        Route::get('/tour/create/',  'create')->name('tour.create');
        Route::post('/tour/store',  'store')->name('tour.store');
        Route::get('/tour/delete/{id}',  'delete')->name('tour.delete');
        Route::get('/tour/edit/{id}', 'edit')->name('tour.edit');
        Route::put('/tour/update/{id}', 'update')->name('tour.update');
    });

});
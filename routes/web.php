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
    $comics = config('db.comics');
    return view('home', compact('comics'));
})->name('home');

Route::get('comics/{id}', function ($id) {
    $comics = config('db.comics'); 
    
    if(is_numeric($id) && $id >= 0 && $id < count($comics)){
       $comic = $comics[$id];
       return view('comics.show', compact('comic'));
    } else{
        abort(404);
    }

    // ddd($comics);
})->name('comics');


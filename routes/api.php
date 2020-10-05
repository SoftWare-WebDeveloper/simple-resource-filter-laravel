<?php

use Illuminate\Support\Facades\Route;

// Books
Route::get('/books/filter', 'BookController@filter');
Route::post('/book', 'BookController@store');

// Category
Route::get('/categories', 'CategoryController@filter');

Route::fallback(function(){
    return response()->json(['message' => 'Page Not Found'], 404);
});

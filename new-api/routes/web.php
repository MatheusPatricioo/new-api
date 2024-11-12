<?php

use Illuminate\Support\Facades\Route;

// Rota para a página inicial (Web)
Route::get('/', function () {
    return view('welcome');
});

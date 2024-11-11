<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// // Definir as rotas de API aqui
// Route::middleware('api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', [UserController::class, 'index']);

<?php

use App\Http\Controllers\Api\V1\InvoiceController;
use App\Http\Controllers\Api\V1\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TesteController;
use Illuminate\Support\Facades\Route;

// Prefixo da API versão 1
Route::prefix('v1')->group(function () {

    // Rota para listar usuários (aberta)
    Route::get('/users', [UserController::class, 'index']);

    // Rota de login (pública)
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    // Grupo protegido por Sanctum
    Route::middleware('auth:sanctum')->group(function () {

        // Rota para teste com habilidade 'teste-index'
        Route::get('/teste', [TesteController::class, 'index'])->middleware('ability:teste-index');

        // Rota para mostrar um usuário específico com habilidade 'user-get'
        Route::get('/users/{user}', [UserController::class, 'show'])->middleware('ability:user-get');

        // Rota de logout protegida
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    // Rotas RESTful para invoices (apenas index pode ser público se desejado)
    Route::apiResource('invoices', InvoiceController::class);
});


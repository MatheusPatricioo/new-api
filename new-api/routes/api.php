<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\V1\UserController;

Route::prefix('V1')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
});

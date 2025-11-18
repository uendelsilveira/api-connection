<?php
/*
 By Uendel Silveira
 Developer Web
 IDE: PhpStorm
 Created: 18/11/2025 02:28:37
*/

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Aqui você pode registrar as rotas da API para o pacote.
| Estas rotas são carregadas pelo AuthApiServiceProvider.
|
*/

Route::prefix('api/auth')
    ->middleware('api')
    ->group(function () {
        // Rotas de autenticação serão adicionadas aqui
        // Exemplo:
        // Route::post('login', [AuthController::class, 'login']);
        // Route::post('register', [AuthController::class, 'register']);
        // Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:api');
    });


<?php
/*
 By Uendel Silveira
 Developer Web
 IDE: PhpStorm
 Created: 18/11/2025 02:28:37
*/

return [
    
    /*
    |--------------------------------------------------------------------------
    | Token Expiration
    |--------------------------------------------------------------------------
    |
    | Define o tempo de expiração dos tokens de acesso em minutos.
    | Padrão: 15 dias (21600 minutos)
    |
    */
    'token_expiration' => env('AUTH_TOKEN_EXPIRATION', 60 * 24 * 15),
    
    /*
    |--------------------------------------------------------------------------
    | Refresh Token Expiration
    |--------------------------------------------------------------------------
    |
    | Define o tempo de expiração dos refresh tokens em minutos.
    | Padrão: 30 dias (43200 minutos)
    |
    */
    'refresh_token_expiration' => env('AUTH_REFRESH_TOKEN_EXPIRATION', 60 * 24 * 30),
    
    /*
    |--------------------------------------------------------------------------
    | Personal Access Token Expiration
    |--------------------------------------------------------------------------
    |
    | Define o tempo de expiração dos tokens de acesso pessoal em minutos.
    | Padrão: 6 meses (259200 minutos)
    |
    */
    'personal_token_expiration' => env('AUTH_PERSONAL_TOKEN_EXPIRATION', 60 * 24 * 180),
    
    /*
    |--------------------------------------------------------------------------
    | API Prefix
    |--------------------------------------------------------------------------
    |
    | Define o prefixo das rotas da API.
    | Padrão: 'api/auth'
    |
    */
    'route_prefix' => env('AUTH_API_ROUTE_PREFIX', 'api/auth'),
    
    /*
    |--------------------------------------------------------------------------
    | API Middleware
    |--------------------------------------------------------------------------
    |
    | Define os middlewares aplicados às rotas da API.
    |
    */
    'middleware' => [
        'api',
    ],
    
];


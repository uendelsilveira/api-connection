<?php

return [
	'token_expiration' => env('AUTH_TOKEN_EXPIRATION', 60 * 24 * 15), // 15 dias em minutos
	'refresh_token_expiration' => env('AUTH_REFRESH_TOKEN_EXPIRATION', 60 * 24 * 30), // 30 dias em minutos
	'personal_token_expiration' => env('AUTH_PERSONAL_TOKEN_EXPIRATION', 60 * 24 * 180), // 6 meses em minutos
];

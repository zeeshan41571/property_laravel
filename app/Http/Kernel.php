<?php

protected $routeMiddleware = [
    // ...
    'role' => \App\Http\Middleware\CheckRole::class,
];

protected $routeMiddleware = [
    // ...
    'admin' => \App\Http\Middleware\AdminMiddleware::class,
];

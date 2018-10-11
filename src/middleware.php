<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(function ($request, $response, $next) {
    $response->getBody()->write('ANTES');
    $response = $next($request, $response);
    $response->getBody()->write('depois');

    return $response;
});

$app->add(function ($request, $response, $next) {
    $response->getBody()->write('OUTRO MIDDLEWARE');
    $response = $next($request, $response);

    return $response;
});

// $app->add(function ($request, $response, $next) {
//     $isAuth = $_SESSION['user'] ?? null;

//     if ($isAuth) {
//         $response = $next($request, $response);
//     } else {
//         die('você n]ao está autenticado');
//     }

//     return $response;
// });

<?php

use Slim\Http\Request;
use Slim\Http\Response;

require __DIR__ . '/ControllerDeExemplo.php';

$middlewaExclusive = function ($request, $response, $next) {
    $response->getBody()->write('middleware exclusivo');
    $response = $next($request, $response);
    return $response;
};

// Routes

$app->get('/[{name}]', function (Request $request, Response $response, array $args) {
    // Sample log message
    $this->logger->info("Slim-Skeleton '/' route");

    // $this->pdo->query('insert into users (username, password, created, modified) values ("erik", "123456", NOW(), NOW())');

    // $stmt = $this->pdo->query('select * from users');
    // $data = $stmt->fetchAll();

    // var_dump($data);
    // exit;

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});

$controller = new Controller($container);

$app->get('/erik-figueiredo-qwe/{id}[/name/{name}]', $controller)->add($middlewaExclusive);

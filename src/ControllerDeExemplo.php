<?php

class Controller
{
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function __invoke ($request, $response, $args) {
        $stmt = $this->container->get('pdo')->query('select * from users WHERE id=' . $args['id']);
        $data = $stmt->fetchAll();

        $name = $args['name'] ?? 'Nenhum especificado';

        return 'Olá ' . $data[0]['username'] . ', você informou o nome ' . $name . ' na url';
    }
}

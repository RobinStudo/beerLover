<?php

namespace App\Core;

use App\Core\Router\Router;
use DI\Container;

class Kernel
{
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
    }

    public function handle(): void
    {
        $uri = $_SERVER['PATH_INFO'] ?? '/';

        $router = new Router();
        $route = $router->match($uri);

        if ($route) {
            $controllerName = $route->getController();
            $method = $route->getMethod();

            $controller = $this->container->get($controllerName);
            $controller->$method();
        } else {
            http_response_code(404);
        }
    }
}

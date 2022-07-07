<?php

namespace App\Core;

use App\Core\Router\Router;

class Kernel
{
    public function handle()
    {
        $uri = $_SERVER['PATH_INFO'] ?? '/';

        $router = new Router();
        $route = $router->match($uri);

        if ($route) {
            $controllerName = $route->getController();
            $method = $route->getMethod();
            
            $controller = new $controllerName();
            $controller->$method();
        } else {
            http_response_code(404);
        }
    }
}

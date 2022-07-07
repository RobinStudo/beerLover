<?php

namespace App\Core\Router;

class Router
{
    const CONFIG_PATH = '../config/routes.yaml';
    private array $routes = [];

    public function __construct()
    {
        $this->loadRoutes();
    }

    public function match(string $uri): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->getUri() === $uri) {
                return $route;
            }
        }

        return null;
    }

    private function loadRoutes(): void
    {
        $loadedRoutes = yaml_parse_file(self::CONFIG_PATH);

        foreach ($loadedRoutes as $routeKey => $loadedRoute) {
            $route = new Route($routeKey, $loadedRoute['uri'], $loadedRoute['controller'], $loadedRoute['method']);
            $this->routes[] = $route;
        }
    }
}

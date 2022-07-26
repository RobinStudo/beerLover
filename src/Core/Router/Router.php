<?php

namespace App\Core\Router;

use Exception;


// Il gère le système de routes
class Router
{
    const CONFIG_PATH = '../config/routes.yaml';
    private array $routes = [];

    public function __construct()
    {
        $this->loadRoutes();
    }

    // Permet d'associer un objet Route avec ce qui se trouve dans l'URL
    public function match(string $uri): ?Route
    {
        foreach ($this->routes as $route) {
            if ($route->getUri() === $uri) {
                return $route;
            }
        }

        return null;
    }

    public function buildLink(string $routeName): string
    {
        foreach ($this->routes as $route) {
            if ($route->getName() === $routeName) {
                return $route->getUri();
            }
        }

        throw new Exception("Unable to find route : " . $routeName);
    }

    public function redirect(string $routeName): void
    {
        foreach ($this->routes as $route) {
            if ($route->getName() === $routeName) {
                header('Location: ' . $route->getUri());
                exit();
            }
        }

        throw new Exception("Unable to find route : " . $routeName);
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

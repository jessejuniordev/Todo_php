<?php

namespace core;

class Router
{
    private array $routes = [];

    /**
     * Cria uma instancia do Route das minhas rotas vindo do public/index
     * 
     * @return object Route
     */
    public function add(string $uri, string $request, string $controller)
    {
        $this->routes[] = new Route($uri, $request, $controller);
    }

    /**
     * Inicia minhas rotas, verifica se a rota 
     * 
     * @return mixed Instance Controller
     */
    public function init()
    {
        foreach ($this->routes as $route) {
            if ($route->match($route)) {
                return (new Controller)->call($route);
            }
        }

        return (new Controller)->call(new Route('/404', 'GET', 'NotFoundController:index'));
    }
}

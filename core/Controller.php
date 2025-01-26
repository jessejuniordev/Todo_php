<?php

namespace core;

class Controller
{

    public function call(Route $route)
    {
        $controller = $route->controller;

        if (!str_contains($controller, ':')) {
            throw new \Exception("Semi colon need to controller {$controller} in route");
        }

        [$controller, $method] = explode(':', $controller);

        $controllerInstance = 'app\\controllers\\' . $controller;
        
        if (!class_exists($controllerInstance)) {
            throw new \Exception("Controller {$controller} does not exist");
        }

        $controller = new $controllerInstance;

        if (!method_exists($controller, $method)) {
            throw new \Exception("Method {$method} does not exist");
        }

        // Como se eu estivesse chamando $controller->$method();
        // O [] é para caso precisar passar os parametros
        call_user_func_array([$controller, $method], []);
    }
}

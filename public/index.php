<?php

use core\Router;

require '../vendor/autoload.php';

try {
    $route = new Router;

    $route->add('/', 'GET', 'HomeController:index');
    $route->add('/tasks', 'GET', 'TaskController:index');
    $route->add('/tasks/add', 'GET', 'TaskController:add');

    $route->init();
} catch (\Exception $e) {
    var_dump($e->getMessage() . ' | ' . $e->getFile() . ' => ' . $e->getLine());
}

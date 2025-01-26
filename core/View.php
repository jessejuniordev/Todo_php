<?php

namespace core;

use League\Plates\Engine;

class View
{
    private static array $instances = [];

    private static function addInstaces($instanceKey, $instanceClass)
    {
        if (!isset(self::$instances[$instanceKey])) {
            self::$instances[$instanceKey] = new $instanceClass;
        }
    }

    public static function render(string $view, array $data = [])
    {
        $path = dirname(__FILE__, 2);
        $filePath = $path . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR;

        if (!file_exists($filePath . $view . '.php')) {
            throw new \Exception("View {$view} does not exists");
        }

        // self::addInstaces('auth', new Auth);
        self::addInstaces('task', new \app\library\Task);

        $templates = new Engine($filePath);
        $templates->addData(['instances' => self::$instances]);
        echo $templates->render($view, $data);
    }
}

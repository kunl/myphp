<?php

namespace core;

class kunl
{
    static $classMap = [];
    
    public static function run()
    {
        $route = new \core\lib\route();
        $controllerClass = $route->controller;
        $action = $route->action;

        $controllerFile = APP.'/controller/'.$controllerClass.'Controller.php';
        $class = '\\'.MODULE.'\controller\\'.$controllerClass;
             
        if (is_file($controllerFile)) {
            include  $controllerFile;
       
            
            $controller = new $class();

            // if(isset ($controller->$action)) {
            //      $controller->$action();
            // } else {
            //     throw new \Exception('找不到方法');
            // }
            $controller->$action();
        } else {
            throw new \Exception('找不到控制器');
        }
    }

    public static function load($class)
    {

        if (isset($classMap[$class])) {
            return true;
        } else {
            $class = str_replace('\\', '/', $class);
            $file = KUNL.'/'.$class.'.php';

            if (is_file($file)) {
                include($file);
                self::$classMap[$class] = $class;
            } else {
                return false;
            }
        }
    }
}

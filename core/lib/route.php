<?php
namespace core\lib;

class route {
    public $controller;
    public $action;

    public function __construct() {

        $path = $_SERVER['REQUEST_URI'];

        if( isset($path) && $path != '/') {
            $pathArray = explode('/', trim($path, '/'));

            if( isset($pathArray[0]) ) {
                $this->controller = $pathArray[0];
            }
            unset($pathArray[0]);

            if( isset($pathArray[1])) {
                $this->action = $pathArray[1];
                unset($pathArray[1]);
            } else {
                $this->action = 'index';
            }

            $count = count($pathArray) + 2;
            $i = 2;
            while( $i < $count ) {
                if(isset($pathArray[$i + 1])) {
                    $_GET[$pathArray[$i]] = $pathArray[$i + 1];
                }
                 $i += 2;
            }

        } else {
            $this->controller = 'index';
            $this->action = 'index';
        }

    }
}
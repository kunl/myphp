<?php
// 入口文件
// 定义常量
// 加载函数库
// 启动框架

define('KUNL', realpath('./'));
define('CORE', KUNL.'/core');
define('APP', KUNL.'/app');

define('DEBUG', true);

if(DEBUG) {
    ini_set('display_error', 'On');
} else {
    ini_set('display_error', 'Off');
}

include(CORE.'/common/function.php');

include(CORE.'/kunl.php');

\core\kunl::run();
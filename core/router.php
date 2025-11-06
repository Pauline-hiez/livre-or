<?php

if (!defined('ROOT')) {
    define('ROOT', dirname(__DIR__));
}
if (!defined('CONTROLLER_PATH')) {
    define('CONTROLLER_PATH', ROOT . '/controllers');
}
if (!defined('MODEL_PATH')) {
    define('MODEL_PATH', ROOT . '/model');
}
if (!defined('VIEW_PATH')) {
    define('VIEW_PATH', ROOT . '/view');
}

function dispatch()
{
    $url = $_GET['url'] ?? "";

    $router = [
        'controller' => 'home',
        'action' => 'index',
        'params' => []
    ];

    if (!empty($url)) {
        $url_parse = explode('/', $url);
        $router['controller'] = $url_parse[0];
        $router['action'] = $url_parse[1] ?? 'index';
    }

    $model_file = MODEL_PATH . '/' . $router['controller'] . '_model.php';
    if (file_exists($model_file)) {
        require_once $model_file;
    }

    $controller_file = CONTROLLER_PATH . '/' . $router['controller'] . '_controller.php';

    if (!file_exists($controller_file)) {
        echo "error";
    }

    require_once $controller_file;

    $action_name = $router['controller'] . '_' . $router['action'];

    call_user_func_array($action_name, $router['params']);
}

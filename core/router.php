<?php

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

    // var_dump($router);

    if (file_exists(CONTROLLER_PATH . '/' . $router['controller'] . '_controller.php')) {
        echo "ok";
    }
}

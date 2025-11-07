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

    // Remplacer les tirets par des underscores pour que PHP accepte le nom de fonction
    $router['action'] = str_replace('-', '_', $router['action']);

    $model_file = MODEL_PATH . '/' . $router['controller'] . '_model.php';
    if (file_exists($model_file)) {
        require_once $model_file;
    }

    $controller_file = CONTROLLER_PATH . '/' . $router['controller'] . '_controller.php';
    if (!file_exists($controller_file)) {
        echo "Erreur : contrôleur introuvable";
        exit;
    }

    require_once $controller_file;

    $action_name = $router['controller'] . '_' . $router['action'];

    if (!function_exists($action_name)) {
        echo "Erreur : action '$action_name' introuvable";
        exit;
    }

    call_user_func_array($action_name, $router['params']);
}

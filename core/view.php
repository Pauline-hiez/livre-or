<?php

function load_view_with_layout($view, $data = [], $layout = 'layout')
{
    ob_start();
    load_view($view, $data);

    $data['content'] = ob_get_clean();

    load_view('layout/' . $layout, $data);
}

function load_view($view, $data = [])
{
    if (!empty($data)) {
        extract($data);
    }

    $view_file = VIEW_PATH . '/' . $view . '.php';

    if (!file_exists($view_file)) {
        echo 'error';
        return;
    }

    require_once $view_file;
}

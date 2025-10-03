<?php

session_start();

define('MODEL_PATH', __DIR__ . '/models/');
define('VIEW_PATH', __DIR__ . '/views/');
define('CONTROLLER_PATH', __DIR__ . '/controllers/');

define('LAYOUT_PATH', VIEW_PATH . 'layouts/');

define('ASSETS_PATH', __DIR__ . '/assets/');

$url = isset($_GET['url']) ? $_GET['url'] : 'home/redirect';
$url = rtrim($url, '/');
$segments = explode('/', $url);

$controllerName = ucfirst($segments[0]) . 'Controller';
$method = $segments[1] ?? 'index';
$params = array_slice($segments, 2);

if (file_exists(CONTROLLER_PATH . $controllerName . ".php")) {
    require_once CONTROLLER_PATH . $controllerName . ".php";
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        require_once CONTROLLER_PATH . 'HomeController.php';
        $controller = new HomeController();
        $controller->error('404');
    }
} else {
    require_once CONTROLLER_PATH . 'HomeController.php';
    $controller = new HomeController();
    $controller->error('404');
}

?>
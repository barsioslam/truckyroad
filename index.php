<?php

session_start();

define('DEBUG', true);

if (DEBUG) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', '0');
    ini_set('display_startup_errors', '0');
    error_reporting(0);
}

define('MODEL_PATH', __DIR__ . '/models/');
define('VIEW_PATH', __DIR__ . '/views/');
define('CONTROLLER_PATH', __DIR__ . '/controllers/');
define('LAYOUT_PATH', VIEW_PATH . '_layouts/');
define('ASSETS_PATH', __DIR__ . '/assets/');

require_once(ASSETS_PATH . 'php/AutoLoad.php');

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\AccountController;
use App\Controllers\DashboardController;

$url = isset($_GET['url']) ? $_GET['url'] : 'home/index';
$url = rtrim($url, '/');
$segments = explode('/', $url);

$controllerName = "App\\Controllers\\" . ucfirst($segments[0]) . "Controller";
$method = $segments[1] ?? 'index';
$params = array_slice($segments, 2);

if (class_exists($controllerName)) {
    $controller = new $controllerName();

    if (method_exists($controller, $method)) {
        call_user_func_array([$controller, $method], $params);
    } else {
        if (class_exists(\App\Controllers\HomeController::class)) {
            http_response_code(404);
            $errcontroller = new HomeController();
            $errcontroller->error("404");
        } else {
            exit("Class is missing: App\Controllers\HomeController");
        }
    }
} else {
    $controller = new App\Controllers\HomeController();
    if (method_exists($controller, $segments[0])) {
        call_user_func_array([$controller, $segments[0]], $params);
    } else {
        if (class_exists(\App\Controllers\HomeController::class)) {
            http_response_code(404);
            $errcontroller = new HomeController();
            $errcontroller->error("404");
        } else {
            exit("Class is missing: App\Controllers\HomeController");
        }
    }
}

?>
<?php
$url = isset($_GET['url']) ? trim($_GET['url'], '/') : '';

$urlParts = explode('/', $url);

$controllerName = !empty($urlParts[0]) ? ucfirst($urlParts[0]) . 'Controller' : 'HomeController';
$methodName = isset($urlParts[1]) ? $urlParts[1] : 'index';
$params = array_slice($urlParts, 2); 

if (file_exists("app/controllers/$controllerName.php")) {
    require_once "app/controllers/$controllerName.php";
    $controller = new $controllerName();
    
    if (method_exists($controller, $methodName)) {
        call_user_func_array([$controller, $methodName], $params);
    } else {
        http_response_code(404);
        echo "Method Not Found";
    }
} else {
    http_response_code(404);
    echo "Controller Not Found";
}

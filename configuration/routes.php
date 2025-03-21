<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    spl_autoload_register(function($class_name) {
        $file = __DIR__ . '/../controllers/' . $class_name . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    });

    $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2)[0];

    $routes = [
        '/' => ['routesController', 'index'],
        '/anuidade' => ['anuidadeController', 'getTotalAnuidades'],
    ];

    if (array_key_exists($request_uri, $routes)) {
        [$controller, $method] = $routes[$request_uri];

        if (class_exists($controller) && method_exists($controller, $method)) {
            $instancia = new $controller();
            call_user_func([$instancia, $method]);
        } else {
            http_response_code(404);
            echo "Erro 404 - Página não encontrada";
        }
    } else {
        http_response_code(404);
        echo "Erro 404 - Página não encontrada";
    }
?>
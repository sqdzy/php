<?php

    spl_autoload_register(function (string $className){
        require_once('../'.str_replace('\\', '/',$className).'.php');
    });

    $pageFound = false;
    $route_URL = $_GET['route'] ?? '';
    $routes = require('../src/routes.php');

    foreach($routes as $pattern=>$controllerAndAction){
        preg_match($pattern, $route_URL, $matches);
        if (!empty($matches)){
                unset($matches[0]);
                $pageFound = true;
                $actionName = $controllerAndAction[1];
                $controller = new $controllerAndAction[0];
                $controller->$actionName(...$matches);
        }
    }
    if (!$pageFound) echo 'Страница не найдена';


    // $pattern = '/(.*)/';
    // preg_match($pattern, $route_URL, $matches);
    //     if (!empty($matches)){
    //         $pageFound = true;
    //         $controller = new \src\Controllers\MainController;
    //         $controller->main();
    //     }
    
    //     $pattern = '/hello\/([a-z]+)/';
    //     preg_match($pattern, $route, $matches);
    //     if (!empty($matches)){
    //         $pageFound = true;
    //         $controller = new \src\Controllers\MainController;
    //         $controller->sayHello($matches[1]);
    //     }
    // $user = new \src\Models\Users\User('Ivan');
    // $article = new \src\Models\Articles\Article('new title', 'new text', $user);

<?php
class Controller {
    public function sayBye($name) {
        $this->render('Пока, ' . htmlspecialchars($name), 'Страница прощания');
    }

    public function sayHello($name) {
        $this->render('Привет, ' . htmlspecialchars($name), 'Страница приветствия');
    }

    public function render($content, $title = null) {
        $title = $title ?? 'Мой блог';
        echo "<html><head><title>$title</title></head><body>$content</body></html>";
    }
}

class Router {
    protected $routes = [
        'bye' => 'sayBye',
        'hello' => 'sayHello'
    ];

    public function dispatch($controller, $url) {
        $urlParts = explode('/', $url);
        $action = $urlParts[4];
        if (isset($this->routes[$action])) {
            $params = array_slice($urlParts, 5);
            call_user_func_array([$controller, $this->routes[$action]], $params);
        } else {
            echo "404 Not Found";
        }
    }
}

$router = new Router();
$controller = new Controller();
$url = $_SERVER['REQUEST_URI'];
$router->dispatch($controller, $url);
?>

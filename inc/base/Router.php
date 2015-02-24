<?php

class Router {
    /**
     * выбирвает контроллер, метод контроллера и передает параметры, если они есть
     */
    public static function run() {
        $url = isset($_GET['url']) ? trim($_GET['url']) : DEFAULT_CONTROLLER;

        // разбивает строку по /
        $parts = explode('/', rtrim($url, '/'));
        // срез  массива начиная с 2
        $actionParams = array_slice($parts, 2);
        // имя контроллера. Формат: NameController
        $controllerName = ucfirst($parts[0]) . 'Controller';
        // новый объект
        $controller = new $controllerName();
        // метод контроллера
        $action = isset($parts[1]) ? $parts[1] . 'Action' : 'indexAction';
        // выбирает метод контроллера, если он существует
        if (method_exists($controller, $action)) {
            call_user_func_array(array($controller, $action), $actionParams);
        } else {
            $controller = new ErrorController();
            $controller->notFoundAction();
        }

    }
}
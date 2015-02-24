<?php

/**
 * подзагрузка моделей
 */
spl_autoload_register(function ($class) {
    $modelFlag = strpos($class, 'Model');
    if ($modelFlag === false) {
        return;
    }
    $modelFileName = BASE_PATH . 'models' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($modelFileName)) {
        require_once($modelFileName);
    }
});

/**
 * подзагрузка контроллеров
 */
spl_autoload_register(function ($class) {
    $controllerFlag = strpos($class, 'Controller');
    if ($controllerFlag === false) {
        return;
    }
    $controllerFileName = BASE_PATH . 'controllers' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($controllerFileName)) {
        require_once($controllerFileName);
    }
});

/**
 * подзагрузка базовых классов
 */
spl_autoload_register(function ($class) {
    $classFileName = BASE_PATH . 'base' . DIRECTORY_SEPARATOR . $class . '.php';

    if (file_exists($classFileName)) {
        require_once($classFileName);
    }
});

/**
 * лоадер для перехвата Fatal error при ненайденом классе
 */
spl_autoload_register(function ($class) {
    $controller = new ErrorController();
    $controller->classNotFoundAction($class);
    die;
});
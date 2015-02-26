<?php

class Controller {
    /**
     * @var View
     */
    protected $view;

    /**
     * создает объект View
     */
    public function __construct() {
        $this->view = new View();
    }

    /**
     * возвращает url с параметрами
     * первый controller
     * @return string - URL
     */
    public static function url() {
        $args = func_get_args();
        return BASE_URL . implode("/", $args);
    }

    /**
     * проверяет была ли форма отправлена
     * через пост
     * @return bool
     */
    public function isPost() {
        return !empty($_POST);
    }

    /**
     * редеректит пользователя на указанный
     * url
     * @param $url
     */
    public function redirect($url) {
        header('Location: ' . $url);
        die;
    }

    /**
     * выводит сообщение перед
     * перенаправлением на другую страницу
     * @param $url
     * @param $message
     */
    public function redirectWithMes($url, $message) {
        header('Refresh: 2; URL=' . $url);
        echo "<h2 align='center'>" . $message . "</h2>";
        die;
    }
}
<?php

class ErrorController extends Controller {
    /**
     * сообщает об не существовании страницы
     */
    public function notFoundAction() {
        $this->view->display('error/page-not-found');
    }

    /**
     * сообщает об несуществовании класса
     */
    public function classNotFoundAction() {
        $this->view->display('error/class-not-found');
    }
}
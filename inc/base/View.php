<?php

class View {
    /**
     * подгружает views
     * @param $name
     * @param array $data
     */
    public function display($name, array $data = array()) {
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . 'header.php';
        $this->displayPartial($name, $data);
        require BASE_PATH . 'views' . DIRECTORY_SEPARATOR . 'footer.php';
    }

    /**
     * подгружает одно view
     * @param $name
     * @param array $data
     */
    public function displayPartial($name, array $data = array())
    {
        if (!empty($data)) {
            extract($data);
        }
        require(BASE_PATH . 'views' . DIRECTORY_SEPARATOR  . $name . '.php');
    }
}
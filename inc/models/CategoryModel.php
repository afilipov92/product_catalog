<?php

class CategoryModel extends BaseModel {
    public $id = "";
    public $title = "";

    /**
     * проверка валидности формы категорий
     * @return bool
     */
    public function isFormVaild() {
        $this->errors = array();
        if (strlen($this->title) < 5) {
            $this->errors['title'] = "Название категории должно быть от 5 символов";
        }
        if (self::findBy('categories', array('title' => $this->title)) != false) {
            $this->errors['title'] = 'Такая категория уже существует';
        }
        return empty($this->errors);
    }

    /**
     * добавление новой категории в бд
     * @return bool
     */
    public function addCat() {
        $ins = self::connect()->prepare('INSERT INTO categories (title) VALUES (:title)');
        return $ins->execute(array(
            'title' => $this->title,
        ));
    }
}
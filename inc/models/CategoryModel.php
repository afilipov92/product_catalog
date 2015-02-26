<?php

class CategoryModel extends BaseModel {
    public $id = "";
    public $title = "";

    /**
     * проверка валидности формы категорий
     * @param bool $flag - true, если нужно проверить
     * на существование категории
     * @return bool
     */
    public function isFormVaild($flag = false) {
        $this->errors = array();
        if (strlen($this->title) < 5) {
            $this->errors['title'] = "Название категории должно быть от 5 символов";
        }
        if ($flag) {
            if (self::findBy('categories', array('title' => $this->title)) != false) {
                $this->errors['title'] = 'Такая категория уже существует';
            }
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

    /**
     * обновление категории
     * @return bool
     */
    public function updateCat() {
        $ins = self::connect()->prepare('UPDATE categories SET title=:title WHERE id=:id');
        return $ins->execute(array(
            'title' => $this->title,
            'id' => $this->id
        ));
    }
}
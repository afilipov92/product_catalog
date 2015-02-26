<?php

class GoodsModel extends BaseModel {
    public $id = "";
    public $title = "";
    public $description;
    public $image = "";
    public $price = "";
    public $id_cat = "";
    public $uploadimage = "";

    /**
     * проверка валидности формы товара
     * @param bool $flag - true, если нужно проверить
     * на существование такого товара
     * @return bool
     */
    public function isFormVaild($flag = false) {
        $this->errors = array();
        if (strlen($this->title) < 5) {
            $this->errors['title'] = "Название товара должно быть от 5 символов";
        }
        if (strlen($this->description) < 20) {
            $this->errors['description'] = "Описание товара должно быть от 20 символов";
        }
        if (preg_match('/^[0-9]+$/', $this->price) == 0) {
            $this->errors['price'] = "Стоимость товара не является числом";
        }
        if (self::findBy('categories', array('id' => $this->id_cat)) == false) {
            $this->errors['id_cat'] = 'Такая категория не существует';
        }
        if ($flag){
            if (self::findBy('goods', array('title' => $this->title)) != false) {
                $this->errors['title'] = 'Такой товар уже существует';
            }
        }
        return empty($this->errors);
    }

    /**
     * загрузка картинки товара
     * @return bool
     */
    public function uploadImage() {
        $this->errors = array();
        $type = $_FILES['fileimage']['type'];
        if (empty($type)) {
            return true;
        } else if($_FILES["fileimage"]["size"] > 1024*3*1024) {
            $this->errors['image'] = "Размер файла превышает три мегабайта";
            return false;
        } else if ($type != "image/jpeg" && $type != "image/png") {
            $this->errors['image'] = "Загружать можно только изображения";
            return false;
        }
        $this->uploadimage = IMAGE_PATH . basename($_FILES['fileimage']['name']);
        $this->image = basename($_FILES['fileimage']['name']);
        return move_uploaded_file($_FILES['fileimage']['tmp_name'], $this->uploadimage);
    }

    /**
     * добавление товара в бд
     * @return bool
     */
    public function addGoods() {
        $ins = self::connect()->prepare('INSERT INTO goods (title, description, image, price, id_cat) VALUES (:title, :description, :image, :price, :id_cat)');
        return $ins->execute(array(
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'id_cat' => $this->id_cat
        ));
    }

    /**
     * обновление товара
     * @return bool
     */
    public function updateGoods() {
        $ins = self::connect()->prepare('UPDATE goods SET title=:title, description=:description, image=:image, price=:price, id_cat=:id_cat WHERE id=:id');
        return $ins->execute(array(
            'title' => $this->title,
            'description' => $this->description,
            'image' => $this->image,
            'price' => $this->price,
            'id_cat' => $this->id_cat,
            'id' => $this->id
        ));
    }
}
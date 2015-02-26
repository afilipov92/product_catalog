<?php

class BaseModel {
    /**
     * @var PDO
     */
    private static $db;
    /**
     * @var array errors
     */
    protected $errors;

    /**
     * возвращает соединение с базой данных
     * @return PDO
     * @throws Exception
     */
    public static function connect() {
        if (!isset(self::$db)) {
            try {
                self::$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8;', DB_USER, DB_PASSWORD);
            } catch (PDOException $e) {
                throw new Exception("Ошибка соединения с базой данных" . $e->getMessage());
            }
        }
        return self::$db;
    }

    /**
     * устанавливает свойства модели из массива
     * @param array $arr assoc array: свойство - значение
     */
    public function setAttributes(array $arr) {
        foreach ($arr as $key => $val) {
            $this->$key = trim($val);
        }
    }

    /**
     * возвращает выборку из базы, одно или несколько полей
     * @param $table - имя таблицы
     * @param array $condition - поисковые поля
     * @param bool $flag - определяет нужно одно значение, или все
     * @return array|mixed
     */
    public static function findBy($table, array $condition = array(), $flag = false) {
        $query = "SELECT * FROM " . $table;
        if (!empty($condition)) {
            $query .= " WHERE ";
            $whereCondition = array();
            foreach ($condition as $key => $val) {
                array_push($whereCondition, "$key = :$key");
            }
            $query .= implode(" AND ", $whereCondition);
        }
        try {
            $sel = self::connect()->prepare($query);
            $sel->execute($condition);
            if ($flag) {
                return $sel->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return $sel->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /**
     * Возвращает данные для данной страницы
     * @param $table - имя таблицы
     * @param int $pageNum - номер страницы
     * @param null $id
     * @param int $pageSize - количество записей для страницы
     * @return array
     */
    public static function getItemsForPage($table, $pageNum = 1, $id = NULL, $pageSize = PAGE_SIZE_FOR_CAT) {
        $num = ($pageNum - 1) * $pageSize;
        $query = "SELECT * FROM " . $table;
        if ($id) {
            $query .= " WHERE id_cat=:id";
        }
        $query .= " ORDER BY id DESC LIMIT :limit OFFSET :offset";
        try {
            $st = self::connect()->prepare($query);
            if ($id) {
                $st->bindParam(':id', $id, PDO::PARAM_INT);
            }
            $st->bindParam(':limit', $pageSize, PDO::PARAM_INT);
            $st->bindParam(':offset', $num, PDO::PARAM_INT);
            $st->execute();
            return $st->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    /**
     * Возвращает общее колличество записей
     */
    public static function getTotalCount($table, array $condition = array()) {
        $query = 'SELECT COUNT(*) FROM ' . $table;
        if (!empty($condition)) {
            $query .= " WHERE ";
            $whereCondition = array();
            foreach ($condition as $key => $val) {
                array_push($whereCondition, "$key = :$key");
            }
            $query .= implode(" AND ", $whereCondition);
        }
        $st = self::connect()->prepare($query);
        $st->execute($condition);
        return $st->fetchColumn();
    }

    /**
     * возврашает ошибки
     * @return array - ошибки
     */
    public function getErrors() {
        return $this->errors;
    }

    /**
     * закрывает соединение с базой
     */
    public function __destructor() {
        self::$db = null;
    }
}
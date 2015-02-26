<?php

define('DEFAULT_CONTROLLER', 'Main');

define('BASE_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('BASE_URL', 'http://' . $_SERVER['SERVER_NAME'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));
define('IMAGE_PATH', str_replace(DIRECTORY_SEPARATOR . 'inc', '', BASE_PATH) . 'images' . DIRECTORY_SEPARATOR . 'goods' . DIRECTORY_SEPARATOR);
/**
 * соединение с бд
 */
define('DB_HOST', 'localhost');
define('DB_NAME', 'product_catalog');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

define('PAGE_SIZE_FOR_CAT', 8);

require_once(__DIR__ . '/base/autoloaders.php');
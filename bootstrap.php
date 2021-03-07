<?php

// Вывод всех ошибок
error_reporting(E_ALL);
ini_set('display_errors',true);

// Файл константов
require $_SERVER['DOCUMENT_ROOT'] . '/helper/constants.php';

// Файл автозагрузки классов (composer)
require APP_DIR . '/vendor/autoload.php';

use App\Session;

// Устанавливаю время сессии
Session::setParams(2592000, '/');
Session::start();

// Файл вспомагательных функций
require APP_DIR . '/helper/helpers.php';

// Файл редиректов
require APP_DIR . '/helper/redirects.php';
<?php

// Файл конфигурации
require_once $_SERVER['DOCUMENT_ROOT'] . '/bootstrap.php';

use App\Application;
use App\Router;

$router = new Router();

// Файл роутов
require APP_DIR . '/routes.php';

$application = new Application($router);

// Запуск приложения
$application->run();

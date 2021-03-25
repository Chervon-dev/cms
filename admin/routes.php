<?php

use App\Controller\Admin\DashboardController;
use App\Controller\Admin\UsersController;

// Роуты основных страниц (GET)
$router->get('/admin/', DashboardController::class . '@showPage');
$router->get('/admin/users', UsersController::class . '@showPage');

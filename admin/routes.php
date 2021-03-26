<?php

use App\Controller\Admin\DashboardController;
use App\Controller\Admin\UsersController;
use App\Controller\Admin\PostsController;

// Роуты основных страниц (GET)
$router->get('/admin/', DashboardController::class . '@showPage');
$router->get('/admin/users', UsersController::class . '@showPage');
$router->get('/admin/posts', PostsController::class . '@showPage');

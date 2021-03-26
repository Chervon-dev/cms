<?php

use App\Controller\AuthController;
use App\Controller\MainController;
use App\Controller\PostController;
use App\Controller\UserController;
use App\Controller\SubscriptionController;
use App\Controller\Admin\DashboardController;
use App\Controller\Admin\UsersController;
use App\Controller\Admin\PostsController;

// Роуты основных страниц (GET)
$router->get('/', MainController::class . '@showPage');
$router->get('/posts/*', PostController::class . '@showPage');

// Роуты для работы в профиле
$router->get('/profile', UserController::class . '@me');
$router->get('/users/*', UserController::class . '@show');
// (POST)
$router->post('/profile/update/data', UserController::class . '@update');
$router->post('/profile/update/avatar', UserController::class . '@updateAvatar');

// Рауты для работы с аутентификацией (GET)
$router->get('/auth/login', AuthController::class . '@showPageLogin');
$router->get('/auth/signup', AuthController::class . '@showPageSignup');
$router->get('/auth/logout', AuthController::class . '@logout');

// Рауты для работы с аутентификацией (POST)
$router->post('/auth/signup/run', AuthController::class . '@registration');
$router->post('/auth/login/run', AuthController::class . '@login');

// Рауты для работы с подписками (POST)
$router->post('/subscribe/sign', SubscriptionController::class . '@sign');
$router->post('/subscribe/unsubscribe', SubscriptionController::class . '@unsubscribe');

// Роуты основных страниц (GET)
$router->get('/admin', DashboardController::class . '@showPage');
$router->get('/admin/users', UsersController::class . '@showPage');
$router->get('/admin/posts', PostsController::class . '@showPage');


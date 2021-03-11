<?php

use App\Controller\AuthController;
use App\Controller\MainController;
use App\Controller\PostController;
use App\Controller\ProfileController;
use App\Controller\SubscriptionController;

// Роуты основных страниц (GET)
$router->get('/', MainController::class . '@showPage');
$router->get('/post/*', PostController::class . '@showPage');

// Роуты для работы в профиле
$router->get('/profile', ProfileController::class . '@showPageProfile');
$router->get('/users/*', ProfileController::class . '@showPageUserInfo');
// (POST)
$router->post('/profile/update/data', ProfileController::class . '@updateData');
$router->post('/profile/update/avatar', ProfileController::class . '@updateAvatar');

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

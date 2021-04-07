<?php

use App\Controller\Admin\Posts\CommentController;
use App\Controller\AuthController;
use App\Controller\MainController;
use App\Controller\PostController;
use App\Controller\UserController;
use App\Controller\SubscriptionController;

use App\Controller\Admin\SettingsController;
use App\Controller\Admin\DashboardController;

use App\Controller\Admin\Users\UsersController;
use App\Controller\Admin\Posts\PostsController;
use App\Controller\Admin\Pages\PagesController;

use App\Controller\Admin\Users\UserController as AdminUserController;
use App\Controller\Admin\Posts\PostController as AdminPostController;
use App\Controller\Admin\Pages\PageController;

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


// Роуты основных страниц админки (GET)
$router->get('/admin/', DashboardController::class . '@showPage');
$router->get('/admin/users', UsersController::class . '@showPage');
$router->get('/admin/posts', PostsController::class . '@showPage');
$router->get('/admin/pages', PagesController::class . '@showPage');
$router->get('/admin/settings', SettingsController::class . '@showPage');

// Роуты страниц админки для изменения данных (GET)
$router->get('/admin/change/user/*', AdminUserController::class . '@changePage');
$router->get('/admin/change/post/*', AdminPostController::class . '@changePage');
$router->get('/admin/change/page/*', PageController::class . '@changePage');
$router->get('/admin/show/comment/*', CommentController::class . '@changePage');

// Роуты страниц админки для создания сущности (GET)
$router->get('/admin/create/user', AdminUserController::class . '@createPage');
$router->get('/admin/create/post', AdminPostController::class . '@createPage');
$router->get('/admin/create/page', PageController::class . '@createPage');
$router->get('/admin/create/comment/for/*', CommentController::class . '@createPage');

// Роуты страниц админки для изменения данных (POST)
$router->post('/admin/change/user', AdminUserController::class . '@change');
$router->post('/admin/change/post', AdminPostController::class . '@change');
$router->post('/admin/change/page', PageController::class . '@change');
$router->post('/admin/change/comment', CommentController::class . '@change');

// Роуты страниц админки для создания сущности (POST)
$router->post('/admin/create/user/post', AdminUserController::class . '@create');
$router->post('/admin/create/post/post', AdminPostController::class . '@create');
$router->post('/admin/create/page/post', PageController::class . '@create');
$router->post('/admin/create/comment/post', CommentController::class . '@create');

// Роуты страниц админки для удаления сущности (POST)
$router->post('/admin/delete/user', AdminUserController::class . '@delete');
$router->post('/admin/delete/post', AdminPostController::class . '@delete');
$router->post('/admin/delete/page', PageController::class . '@delete');
$router->post('/admin/delete/comment', CommentController::class . '@delete');

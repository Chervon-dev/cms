<?php

// Если пользователь авторизован и
// пытается открыть страницу аутентификации
if (isAuthorized() && isAuthPage()) {
    header('location: /profile');
}

// Если пользователь неавторизован и
// пытается открыть страницу профиля
if (!isAuthorized() && isActivePage('/profile')) {
    header('location: /auth/login');
}

// Если пользователь пытается войти в админку неавторизованным
if (str_starts_with(URI, '/admin') && !getActiveUserId()) {
    header('location: /auth/login');
}

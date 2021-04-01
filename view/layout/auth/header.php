<?php

// Если пользователь авторизован и
// пытается открыть страницу аутентификации
if (isAuthorized()) {
    header('location: /profile');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="/view/assets/css/login.css">

    <link rel="apple-touch-icon" sizes="72x72" href="/view/assets/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/view/assets/apple-icon-114x114.png">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

</head>
<body id="page-top">

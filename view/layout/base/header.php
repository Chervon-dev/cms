<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>

    <?php if (isAuthPage()): ?>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="/view/assets/css/login.css">

    <?php else: ?>

        <link rel="stylesheet" href="/view/assets/css/bootstrap.css">
        <link rel="stylesheet" href="/view/assets/fonts/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/view/assets/fonts/flaticons/flaticon.css">
        <link rel="stylesheet" href="/view/assets/fonts/glyphicons/bootstrap-glyphicons.css">

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:400,800">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Baloo+Thambi">

        <link rel="stylesheet" href="/view/assets/css/plugins.css">
        <link rel="stylesheet" href="/view/assets/styles/maincolors.css">
        <link rel="stylesheet" href="/view/assets/css/style.css">

    <?php endif; ?>

    <link rel="apple-touch-icon" sizes="72x72" href="/view/assets/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/view/assets/apple-icon-114x114.png">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

</head>
<body id="page-top">

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
          content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, materialpro admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, materialpro admin lite design, materialpro admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
          content="Material Pro Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title><?= $title ?></title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/materialpro-lite/"/>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/view/admin/assets/images/favicon.png">
    <!-- chartist CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link href="/view/admin/assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="/view/admin/assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="/view/admin/assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css"
          rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="/view/admin/assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="/view/admin/assets/css/style.min.css" rel="stylesheet">
</head>

<body>

<div class="preloader">
    <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
    </div>
</div>

<div id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
     data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">

    <header class="topbar" data-navbarbg="skin6">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">

            <div class="navbar-header" data-logobg="skin6">
                <a class="navbar-brand ms-4" href="/admin/">
                    <b class="logo-icon">
                        <img src="/view/admin/assets/images/logo-light-icon.png" alt="homepage" class="dark-logo"/>
                    </b>
                    <span class="logo-text">
                        <img src="/view/admin/assets/images/logo-light-text.png" alt="homepage" class="dark-logo"/>
                    </span>
                </a>
                <a class="nav-toggler waves-effect waves-light text-white d-block d-md-none" href="javascript:void(0)">
                    <i class="ti-menu ti-close"></i>
                </a>
            </div>

            <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">

                <ul class="navbar-nav d-lg-none d-md-block ">
                    <li class="nav-item">
                        <a class="nav-toggler nav-link waves-effect waves-light text-white "
                           href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    </li>
                </ul>

                <ul class="navbar-nav me-auto mt-md-0 "></ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="#"
                           id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img style="height: 30px;" src="/view/assets/img/users/<?= $avatar ?>" alt="user"
                                 class="profile-pic me-2"><?= $name ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown"></ul>
                    </li>
                </ul>

            </div>
        </nav>
    </header>

    <aside class="left-sidebar" data-sidebarbg="skin6">
        <div class="scroll-sidebar">
            <nav class="sidebar-nav">
                <ul id="sidebarnav">
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/"
                           aria-expanded="false">
                            <i class="mdi me-2 mdi-gauge"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/users"
                           aria-expanded="false">
                            <i class="mdi me-2 mdi-account-check"></i>
                            <span class="hide-menu">Users</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/posts"
                           aria-expanded="false">
                            <i class="mdi me-2 mdi-table"></i>
                            <span class="hide-menu">Posts</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/pages"
                           aria-expanded="false">
                            <i class="mdi me-2 mdi-book-open-variant"></i>
                            <span class="hide-menu">Static pages</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link" href="/admin/settings"
                           aria-expanded="false">
                            <i class="mdi me-2 mdi-settings"></i>
                            <span class="hide-menu">Settings</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>

        <div class="sidebar-footer">
            <div class="row">
                <div class="col-4 link-wrap">
                    <a href="/admin/settings" class="link" data-toggle="tooltip" title=""
                       data-original-title="Settings">
                        <i class="ti-settings"></i>
                    </a>
                </div>
                <div class="col-4 link-wrap">
                    <a href="" class="link" data-toggle="tooltip" title="" data-original-title="Email">
                        <i class="mdi mdi-gmail"></i>
                    </a>
                </div>
                <div class="col-4 link-wrap">
                    <a href="/" class="link" data-toggle="tooltip" title="" data-original-title="Logout">
                        <i class="mdi mdi-power"></i>
                    </a>
                </div>
            </div>
        </div>
    </aside>

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row align-items-center">
                <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0">Dashboard</h3>
                </div>
            </div>
        </div>
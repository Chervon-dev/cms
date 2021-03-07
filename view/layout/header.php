<?php

$theme->baseHeader($title);

?>

<div id="preloader">
    <div class="spinner">
        <div class="bounce1"></div>
    </div>
</div>

<nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                <i class="fa fa-bars"></i>
            </button>
            <div class="navbar-brand navbar-brand-centered">
                <a href="/">
                    <img src="/view/assets/img/logo.png" class="img-responsive my_logo" alt="">
                </a>
            </div>
        </div>

        <div class="collapse navbar-collapse" id="navbar-brand-centered">
            <ul class="nav navbar-nav navbar-right">
                <?php if (isAuthorized()): ?>
                    <li><a href="/profile">Profile</a></li>
                    <li>
                        <a href="/auth/logout" class="logout">Logout &nbsp;
                            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                 width="26" height="26"
                                 viewBox="0 0 172 172"
                                 style=" fill:#000000;">
                                <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                   stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray=""
                                   stroke-dashoffset="0" font-family="none" font-size="none"
                                   style="mix-blend-mode: normal">
                                    <path d="M0,172v-172h172v172z" fill="none"></path>
                                    <g fill="#ffffff">
                                        <path d="M39.69231,0c-10.95673,0 -19.84615,8.88942 -19.84615,19.84615v132.30769c0,10.95673 8.88942,19.84615 19.84615,19.84615h92.61538c10.95673,0 19.84615,-8.88942 19.84615,-19.84615v-34.31731l-13.23077,11.57692v22.74038c0,3.64363 -2.97176,6.61538 -6.61538,6.61538h-92.61538c-3.64363,0 -6.61538,-2.97176 -6.61538,-6.61538v-132.30769c0,-3.64363 2.97176,-6.61538 6.61538,-6.61538h92.61538c3.64363,0 6.61538,2.97176 6.61538,6.61538v22.74038l13.23077,11.57692v-34.31731c0,-10.95673 -8.88942,-19.84615 -19.84615,-19.84615zM109.15385,42.79327c-1.65385,0.49099 -3.30769,2.17067 -3.30769,6.61538v16.74519h-39.69231c-3.64363,0 -6.61538,2.97176 -6.61538,6.61538v26.46154c0,3.64363 2.97176,6.61538 6.61538,6.61538h39.69231v16.53846c0,8.47596 6.61538,6.61538 6.61538,6.61538l49.61538,-43l-49.61538,-43c0,0 -1.65385,-0.69772 -3.30769,-0.20673z"></path>
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                <?php else: ?>
                    <li><a href="/auth/login">Login</a></li>
                    <li><a href="/auth/signup">Sign up</a></li>
                <?php endif; ?>
            </ul>
        </div>

    </div>
</nav>

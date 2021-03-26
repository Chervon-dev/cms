<?php

$theme->customHeader('auth', $title);

?>

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0 my-auth-background">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="/view/assets/img/auth/login.jpg" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div class="brand-wrapper">
                            <img src="/view/assets/img/logo-black.png" alt="logo" class="logo">
                        </div>
                        <p class="login-card-description">Sign into your account</p>

                        <form>

                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control"
                                       placeholder="Email address" autocomplete="on">
                            </div>

                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="password" class="form-control"
                                       placeholder="Password" autocomplete="on">
                            </div>

                        </form>

                        <button class="btn" onclick="user.login()">Login</button>

                        <br>
                        <br>
                        <p class="login-card-footer-text">
                            Don't have an account?
                            <a href="/auth/signup" class="text-reset">Register here</a></p>
                        <nav class="login-card-footer-nav">
                            <a href="#">Site rules.</a>
                            <a href="#">Privacy policy</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $theme->customFooter('auth'); ?>

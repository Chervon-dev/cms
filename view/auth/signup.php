<?php

$theme->customHeader('auth', $title);;

?>

<main class="d-flex align-items-center min-vh-100 py-3 py-md-0 my-auth-background">
    <div class="container">
        <div class="card login-card">
            <div class="row no-gutters">
                <div class="col-md-5">
                    <img src="/view/assets/img/auth/signup.jpg" alt="login" class="login-card-img">
                </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <div>
                            <div class="brand-wrapper">
                                <img src="/view/assets/img/logo-black.png" alt="logo" class="logo">
                            </div>
                            <p class="login-card-description">Register a new account</p>

                            <form>

                                <div class="form-group">
                                    <label for="name" class="sr-only">Name</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                </div>

                                <div class="form-group">
                                    <label for="email" class="sr-only">Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email address">
                                </div>

                                <div class="form-group">
                                    <label for="password" class="sr-only">Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                                </div>

                                <div class="form-group mb-4">
                                    <label for="confirm-password" class="sr-only">Confirm password</label>
                                    <input type="password" name="confirm_password" id="confirm-password" class="form-control" placeholder="Confirm password">
                                </div>

                                <div class="form-group">
                                    <div class="form-check">
                                        <input type="checkbox" name="site_rules_ok" class="form-check-input" id="gridCheck" value="checked">
                                        <label for="gridCheck" class="form-check-label">
                                            I agree with the <a href="#" style="color: black; text-decoration: underline black">site rules</a>
                                        </label>
                                    </div>
                                </div>

                            </form>

                            <button class="btn" onclick="user.add()">Register</button>

                            <br>
                            <br>

                            <p class="login-card-footer-text">
                                Already have an account?
                                <a href="/auth/login" class="text-reset">Login here</a
                            </p>

                            <nav class="login-card-footer-nav">
                                <a href="#">Site rules.</a>
                                <a href="#">Privacy policy</a>
                            </nav>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $theme->customFooter('auth'); ?>

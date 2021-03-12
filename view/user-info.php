<?php

$theme->header($title);

?>

<section id="blog" class="pages profile">
    <div class="container">
        <div class="main-body">
            <div class="row gutters-sm">
                <div class="col-md-4 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center">
                                <div class="mt-3">
                                    <h4 class="mt-0"><?= $user->name ?></h4>
                                </div>
                                <img src="/view/assets/img/users/<?= $user->avatar ?>" alt="Admin"
                                     class="rounded-circle my_avatar_lk">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h4 class="mt-0 text-align-center">Info</h4>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Name</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user->name ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Email</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user->email ?>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Role</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <?= $user->role ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row gutters-sm">
                        <div class="col-sm-12 mb-3">
                            <h4 class="mt-0 text-align-center">About</h4>
                            <p class="text-align-center">
                                <?= $user->about ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $theme->footer(); ?>

<?php

$theme->header($title);
$avatarName = $user->avatar;

?>

<script>
    const avatarName = '<?= $avatarName ?>';
    const avatarPath = '<?= AVATAR_DIR ?>' + avatarName;
</script>

<section id="blog" class="pages" style="margin-top: 100px; padding: 90px 0;">
    <div class="container">
        <div class="profile_form">
            <form class="my_form" enctype="multipart/form-data">

                <div class="my_data">

                    <h3><?= $title ?></h3>
                    <br>

                    <div class="form-group">
                        <input type="text" id="name" name="name" value="<?= $user->name ?? '' ?>" class="form-control"
                               placeholder="Name">
                    </div>
                    <br>

                    <div class="form-group">
                        <input type="email" id="userEmail" name="email" value="<?= $user->email ?? '' ?>"
                               class="form-control" placeholder="Email address">
                    </div>
                    <br>

                    <div class="form-group">
                        <input type="password" id="password" name="password" value="" class="form-control"
                               placeholder="New password">
                    </div>
                    <br>

                </div>

                <div class="my_avatar">
                    <div class="qwerty">
                        <div class="avatar_img-prompt" data-label="<?= $avatarName ?? '' ?>">Drop file hear and click to
                            upload
                        </div>
                        <input type="file" id="img_avatar" class="img_avatar-input"
                               accept="image/png, image/jpg, image/jpeg"/>
                    </div>
                </div>

                <div class="my_about">
                    <div class="form-group">
                        <textarea name="about" class="form-control about" placeholder="About" id="about"
                                  rows="5"><?= $user->about ?? '' ?></textarea>
                    </div>
                    <br>
                </div>

            </form>

            <button class="btn" id="updateUser" onclick="user.update()">Save</button>
        </div>
    </div>
</section>

<?php $theme->footer(); ?>

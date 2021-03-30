<?php

$theme->header($title);

?>

<section id="blog" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Blog Post</h1>
        </div>
    </div>
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li><a href="/">Home</a> <span class="divider"></span></li>
                <li class="active"><?= $post->title ?></li>
            </ul>
        </div>
        <div id="blog-container" class="col-md-9">
            <h3><?= $post->title ?></h3>
            <div class="post-info">
                <p><i class="fa fa-clock-o"></i>Posted on <?= formatDate($post->date, DATE_FORMAT); ?></p>
                <p>
                    <i class="fa fa-user"></i>
                    by <a href="/users/<?= $post->user->id ?>">
                        <?= $post->user->name ?>
                    </a>
                </p>
                <p>
                    <i class="fa fa-comment"></i>
                    <?= $post->comments->count() ?> Comments
                </p>
            </div>
            <div class="blog-post post-main">
                <img class="img-responsive" src="/view/assets/img/posts/<?= $post->img ?>" alt="">
                <p><?= $post->content ?></p>
            </div>

            <?php if (isAuthorized()): ?>

                <div class="row">
                    <div class="col-md-7">
                        <div class="media comment-form">
                            <h5>Leave a Comment:</h5>
                            <div class="form-group">
                                <label>Comment<span class="required">*</span></label>
                                <textarea name="comment" id="comment" class="textarea-field form-control" rows="3"
                                          required=""></textarea>
                            </div>
                            <button type="submit" id="send" value="Submit" class="btn">Post Comment</button>
                        </div>
                    </div>
                </div>

            <?php endif; ?>

            <?php

            $theme->block('list-comments', [
                'comments' => $post->comments,
                'postAuthorId' => $post->user->id
            ]);

            ?>
        </div>

        <?php $theme->block('sidebar'); ?>
    </div>
</section>

<?php $theme->footer(); ?>

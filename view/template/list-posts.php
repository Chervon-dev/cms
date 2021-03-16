<div id="blog-container" class="col-md-9">
    <?php foreach ($posts as $post): ?>

        <div class="blog-post row">

            <div class="img-date">
                <div class="col-md-1 text-center date-category">
                    <i class="fa fa-camera fa-2x"></i>
                    <p><?= formatDate($post->date, 'F j, Y') ?></p>
                </div>

                <div class="img-blog">
                    <a href="/posts/<?= $post->alias ?>">
                        <img class="img-responsive img-post" alt=""
                             src="/view/assets/img/posts/<?= $post->img ?>">
                    </a>
                </div>
            </div>

            <div class="col-md-12">

                <h3>
                    <a href="/posts/<?= $post->alias ?>">
                        <?= $post->title ?>
                    </a>
                </h3>

                <div class="post-info">

                    <p>
                        <i class="fa fa-user"></i>
                        by <a href="/users/<?= $post->user->id ?>">
                            <?= $post->user->name ?>
                        </a>
                    </p>

                    <p>
                        <i class="fa fa-comment"></i>

                        <a href="/posts/<?= $post->alias ?>">
                            <?= $post->comments->count() ?> Comments
                        </a>
                    </p>

                </div>

                <p><?= $post->description ?></p>

                <a class="btn" href="/posts/<?= $post->alias ?>">
                    Read More <i class="fa fa-angle-right"></i>
                </a>
            </div>

        </div>

    <?php endforeach; ?>
</div>

<div class="comments-block">
    <h5>Comments</h5>
    <hr>

    <?php foreach ($comments as $comment): ?>

        <div class="comment media">

            <a href="/users/<?= $comment->user->id ?>">
                <img style="margin-right: 50px" class="media-object my_avatar_lk img-responsive" src="/view/assets/img/users/<?= $comment->user->avatar ?>" alt="">
            </a>

            <div class="media-body">

                <a href="/users/<?= $comment->user->id ?>">
                    <h6 class="media-heading">

                        <?= $comment->user->name ?>&nbsp;
                        <span style="text-transform: none"><?= $comment->user->id === $postAuthorId ? '( Author post )' : '' ?></span>
                        <small><?= formatDate($comment->date, DATE_FORMAT) ?></small>

                    </h6>
                </a>

                <p><?= $comment->text ?></p>
            </div>

        </div>

    <?php endforeach; ?>

</div>

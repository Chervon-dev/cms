<?php

use App\Service\PostService;

$postService = new PostService();

?>

<div class="sidebar col-md-3">
    <div class="well">
        <h5 class="sidebar-header">Latest Posts</h5>
        <div class="row">

            <?php foreach ($postService->getLatestPosts() as $post): ?>

            <div class="blog-latest col-xs-12">
                <div class="col-xs-5">
                    <img src="/view/assets/img/posts/<?= $post->img ?>" alt="" class="img-circle img-responsive">
                </div>
                <div class="col-xs-7">
                    <h6><a href="/posts/<?= $post->alias ?>"><?= $post->title ?></a></h6>
                    <p><?= formatDate($post->date, 'F j, Y') ?></p>
                </div>
            </div>

            <?php endforeach; ?>

        </div>
    </div>

    <div class="well">
        <h5 class="sidebar-header">About Us</h5>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus
            laudantium.
        </p>
    </div>

</div>

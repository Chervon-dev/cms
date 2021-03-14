<?php

$theme->header($title);

?>

<section id="blog" class="pages">
    <div class="jumbotron" data-stellar-background-ratio="0.5">
        <div class="jumbo-heading" data-stellar-background-ratio="1.2">
            <h1>Blog</h1>
        </div>
    </div>
    <div class="container">
        <div id="blog-container" class="col-md-9">
            <div class="blog-post row">
                <div class="img-date">
                    <div class="col-md-1 text-center date-category">
                        <i class="fa fa-camera fa-2x"></i>
                        <p><?= date("F j, Y") ?></p>
                    </div>
                    <div class="img-blog">
                        <a href="/post/1">
                            <img class="img-responsive img-post" src="/view/assets/img/posts/1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>
                        <a href="/post/1">The Best Cat Toys</a>
                    </h3>
                    <div class="post-info">
                        <p><i class="fa fa-user"></i>by <a href="/post/1">John Doe</a></p>
                        <p><i class="fa fa-comment"></i><a href="/post/1">12 Comments</a></p>
                    </div>
                    <p>Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur
                        vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.</p>
                    <a class="btn" href="/post/1">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div class="blog-post row">
                <div class="img-date">
                    <div class="col-md-1 text-center date-category">
                        <i class="fa fa-film fa-2x"></i>
                        <p>June 17, 2015</p>
                    </div>
                    <div class="img-blog">
                        <a href="/post/2">
                            <img class="img-responsive img-post" src="/view/assets/img/posts/2.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>
                        <a href="/post/2">Child Friendly Pets</a>
                    </h3>
                    <div class="post-info">
                        <p><i class="fa fa-user"></i>by <a href="/post/2">John Doe</a></p>
                        <p><i class="fa fa-comment"></i><a href="/post/2">34 Comments</a></p>
                    </div>
                    <p>Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur
                        vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.</p>
                    <a class="btn" href="/post/2">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
            <div class="blog-post row">
                <div class="img-date">
                    <div class="col-md-1 text-center date-category">
                        <i class="fa fa-file-text fa-2x"></i>
                        <p>June 17, 2015</p>
                    </div>
                    <div class="img-blog">
                        <a href="/post/3">
                            <img class="img-responsive img-post" src="/view/assets/img/posts/3.jpg" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-md-12">
                    <h3>
                        <a href="/post/3">Taking care of a puppy</a>
                    </h3>
                    <div class="post-info">
                        <p><i class="fa fa-user"></i>by <a href="/post/3">John Doe</a></p>
                        <p><i class="fa fa-comment"></i><a href="/post/3">24 Comments</a></p>
                    </div>
                    <p>Lorem perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur
                        vero. ipsum dolor sit amet commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate velit esse cillum dolore eu fugiat nulla
                        pariatur.</p>
                    <a class="btn" href="/post/3">Read More <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>

        <?php $theme->block('sidebar'); ?>

        <div class="text-center col-md-12">
            <ul class="pagination">
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>
            </ul>
        </div>
    </div>
</section>

<?php $theme->footer(); ?>

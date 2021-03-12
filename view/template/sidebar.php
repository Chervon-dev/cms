<div class="sidebar col-md-3">

    <div class="well">
        <h5 class="sidebar-header">Categories</h5>
        <div class="row">
            <ul class="list-unstyled">
                <?php foreach ($categories as $category): ?>
                    <li>
                        <a href="?category=<?= $category->id ?>"><?= $category->name ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="well">
        <h5 class="sidebar-header">Latest Posts</h5>
        <div class="row">

            <div class="blog-latest col-xs-12">
                <div class="col-xs-5">
                    <img src="/view/assets/img/bloglatest1.jpg" alt="" class="img-circle img-responsive">
                </div>
                <div class="col-xs-7">
                    <h6><a href="#">Best pet products</a></h6>
                    <p>12 dec 2016</p>
                </div>
            </div>

            <div class="blog-latest col-xs-12">
                <div class="col-xs-5">
                    <img src="/view/assets/img/bloglatest1.jpg" alt="" class="img-circle img-responsive">
                </div>
                <div class="col-xs-7">
                    <h6><a href="#">Our Weekly events</a></h6>
                    <p>29 dec 2016</p>
                </div>
            </div>

            <div class="blog-latest col-xs-12">
                <div class="col-xs-5">
                    <img src="/view/assets/img/bloglatest1.jpg" alt="" class="img-circle img-responsive">
                </div>
                <div class="col-xs-7">
                    <h6><a href="#">Taking care of a puppy</a></h6>
                    <p>22 jan 2017</p>
                </div>
            </div>

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

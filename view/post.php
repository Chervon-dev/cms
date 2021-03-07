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
                <li><a href="#">Home</a> <span class="divider"></span></li>
                <li class="active">Post</li>
            </ul>
        </div>
        <div id="blog-container" class="col-md-9">
            <h3>Title goes Here</h3>
            <div class="post-info">
                <p><i class="fa fa-clock-o"></i>Posted on Aug 24, 2015 at 9:00 PM</p>
                <p><i class="fa fa-user"></i>by <a href="#">John Doe</a></p>
                <p><i class="fa fa-comment"></i>3 Comments</p>
            </div>
            <div class="blog-post post-main">
                <img class="img-responsive" src="/view/assets/img/blogmain1.jpg" alt="">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis tincidunt rhoncus. Integer
                    pulvinar elit ligula, laoreet imperdiet magna consectetur vel. Nullam tempus, tellus sed laoreet
                    porttitor, urna quam efficitur magna, id
                    vestibulum arcu massa eget risus. Mauris sagittis elit nec magna congue aliquam. Nam sollicitudin
                    urna nunc, eu iaculis leo vulputate vel. Donec ultrices ipsum laoreet suscipit consectetur. In
                    pulvinar diam arcu, eu tincidunt arcu mollis
                    quis. Sed vulputate pharetra enim ac pretium. Quisque at rutrum nunc, nec dictum ligula. Vestibulum
                    magna nibh, dapibus at eros et, auctor sagittis ipsum.</p>
                <blockquote>Men dolor sit amet, consectetur adipisiras sit amet nibh libero, in gravida nulla ulla vel
                    metus scelerisque ante sollicitudin commodo cras purus.
                </blockquote>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos, doloribus, dolorem iusto blanditiis
                    unde eius illum consequuntur neque dicta incidunt ullam ea hic porro optio ratione repellat
                    perspiciatis. Enim, iure!</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras venenatis tincidunt rhoncus. Integer
                    pulvinar elit ligula, laoreet imperdiet magna consectetur vel. Nullam tempus, tellus sed laoreet
                    porttitor, urna quam efficitur magna, id
                    vestibulum arcu massa eget risus. Mauris sagittis elit nec magna congue aliquam. Nam sollicitudin
                    urna nunc, eu iaculis leo vulputate vel. Donec ultrices ipsum laoreet suscipit consectetur. In
                    pulvinar diam arcu, eu tincidunt arcu mollis
                    quis. Sed vulputate pharetra enim ac pretium. Quisque at rutrum nunc, nec dictum ligula. Vestibulum
                    magna nibh, dapibus at eros et, auctor sagittis ipsum.</p>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="media comment-form">
                        <h5>Leave a Comment:</h5>
                        <div class="form-group">
                            <label>Name<span class="required">*</span></label>
                            <input type="text" name="name" class="form-control input-field" required="">
                            <label>Email Adress <span class="required">*</span></label>
                            <input type="email" name="email" class="form-control input-field" required="">
                            <label>Comment<span class="required">*</span></label>
                            <textarea name="comment" id="comment" class="textarea-field form-control" rows="3"
                                      required=""></textarea>
                        </div>
                        <button type="submit" id="send" value="Submit" class="btn">Post Comment</button>
                    </div>
                </div>
            </div>
            <div class="comments-block">
                <h5>Comments</h5>
                <hr>
                <div class="comment media">
                    <a href="#">
                        <img class="media-object  img-responsive" src="/view/assets/img/review1.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <a href="#">
                            <h6 class="media-heading">Maria Silva
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h6>
                        </a>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                            commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia
                            congue felis in faucibus.
                        </p>
                        <a class="btn text-right">Reply</a>
                    </div>
                </div>
                <div class="comment media">
                    <a href="#">
                        <img class="media-object  img-responsive" src="/view/assets/img/review2.jpg" alt="">
                    </a>
                    <div class="media-body">
                        <a href="#">
                            <h6 class="media-heading">Mariane Lindberg
                                <small>August 25, 2014 at 9:30 PM</small>
                            </h6>
                        </a>
                        <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin
                            commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce
                            condimentum nunc ac nisi vulputate fringilla. Donec lacinia
                            congue felis in faucibus.
                        </p>
                        <a class="btn text-right">Reply</a>
                        <div class="comment media nested">
                            <a href="#">
                                <img class="media-object img-responsive" src="/view/assets/img/review3.jpg" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#">
                                    <h6 class="media-heading">Nested Comment
                                        <small>August 25, 2014 at 9:30 PM</small>
                                    </h6>
                                </a>
                                <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante
                                    sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra
                                    turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
                                    lacinia congue felis in faucibus.
                                </p>
                                <a class="btn text-right">Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php $theme->block('sidebar'); ?>
    </div>
</section>

<?php $theme->footer(); ?>

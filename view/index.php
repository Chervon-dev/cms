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
        <?php

        $theme->block('list-posts', ['posts' => $posts]);

        $theme->block('sidebar');

        $theme->block('validation', ['paginator' => $paginator]);

        ?>
    </div>

</section>

<?php $theme->footer(); ?>

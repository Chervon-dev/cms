<?php

$theme->header('Posts', true);

?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php

                        $theme->block(
                            'admin/select-perpage',
                            [
                                'params' => $paginationParams,
                                'label' => 'Per page config:',
                            ]
                        );

                        ?>
                        <h4 class="card-title">
                            Posts&nbsp;
                            <a href="/admin/create/post" class="btn btn-create">
                                <i class="mdi me-2 mdi-plus"
                                   style="margin-right: 2px!important;">
                                </i>
                            </a>
                        </h4>
                        <?php

                        $theme->block(
                            'admin/posts-list',
                            [
                                'posts' => $posts->items()
                            ]
                        );

                        ?>
                    </div>
                </div>
            </div>
        </div>

        <?php

        $theme->block('admin/pagination', ['paginator' => $posts]);

        ?>

    </div>

<?php

$theme->footer(true);
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

                        <div class="table-responsive">
                            <table class="table user-table">
                                <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Title</th>
                                    <th class="border-top-0">Author</th>
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0" style="width: 230px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">The Best Cat Toys</a></td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/post/3" class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </a>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#">The Best Cat Toys</a></td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/post/3" class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </a>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">The Best Cat Toys</a></td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/post/3" class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </a>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="#">The Best Cat Toys</a></td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/post/3" class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </a>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="#">The Best Cat Toys</a></td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/post/3" class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </a>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><a href="#">The Best Cat Toys</a></td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/post/3" class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </a>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><a href="#">The Best Cat Toys</a></td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/post/3" class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </a>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php

//        $theme->block('admin/pagination', ['paginator' => $posts]);

        ?>

    </div>

<?php

$theme->footer(true);
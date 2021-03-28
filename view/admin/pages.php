<?php

$theme->header('Pages', true);

?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <?php

                        $theme->block(
                            'admin/select-perpage',
                            ['params' => $paginationParams]
                        );

                        ?>
                        <h4 class="card-title">
                            Pages&nbsp;
                            <a href="/admin/create/page" class="btn btn-create">
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
                                    <th class="border-top-0">Date</th>
                                    <th class="border-top-0" style="width: 230px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">Site Terms of Use</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/page/1" class="btn btn-change" style="width: 100%">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#">Page 2</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/page/3" class="btn btn-change">
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
                                    <td><a href="#">Page 3</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/page/3" class="btn btn-change">
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
                                    <td><a href="#">Page 4</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/page/3" class="btn btn-change">
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
                                    <td><a href="#">Page 5</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/page/3" class="btn btn-change">
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
                                    <td><a href="#">Page 6</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/page/3" class="btn btn-change">
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
                                    <td><a href="#">Page 7</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <a href="/admin/change/page/3" class="btn btn-change">
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

        $theme->block('admin/pagination');

        ?>

    </div>
<?php

$theme->footer(true);
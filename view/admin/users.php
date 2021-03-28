<?php

$theme->header('Users', true);

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
                            Users&nbsp;
                            <a href="/admin/create/user" class="btn btn-create">
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
                                    <th class="border-top-0">Name</th>
                                    <th class="border-top-0">Email</th>
                                    <th class="border-top-0">Role</th>
                                    <th class="border-top-0" style="width: 230px"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="/users/33">Deshmukh</a></td>
                                    <td>Prohaska</td>
                                    <td>@Genelia</td>
                                    <td>
                                        <a href="/admin/change/user/33" class="btn btn-change">
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
                                    <td><a href="/users/33">Deshmukh</a></td>
                                    <td>Gaylord</td>
                                    <td>@Ritesh</td>
                                    <td>
                                        <a href="/admin/change/user/33" class="btn btn-change">
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
                                    <td><a href="/users/33">Deshmukh</a></td>
                                    <td>Gusikowski</td>
                                    <td>@Govinda</td>
                                    <td>
                                        <a href="/admin/change/user/33" class="btn btn-change">
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
                                    <td><a href="/users/33">Deshmukh</a></td>
                                    <td>Rogahn</td>
                                    <td>@Hritik</td>
                                    <td>
                                        <a href="/admin/change/user/33" class="btn btn-change">
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
                                    <td><a href="/users/33">Deshmukh</a></td>
                                    <td>Hickle</td>
                                    <td>@Maruti</td>
                                    <td>
                                        <a href="/admin/change/user/33" class="btn btn-change">
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
                                    <td><a href="/users/33">Deshmukh</a></td>
                                    <td>Eichmann</td>
                                    <td>@Sonu</td>
                                    <td>
                                        <a href="/admin/change/user/33" class="btn btn-change">
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
                                    <td><a href="/users/33">Deshmukh</a></td>
                                    <td>Eichmann</td>
                                    <td>@Sonu</td>
                                    <td>
                                        <a href="/admin/change/user/33" class="btn btn-change">
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
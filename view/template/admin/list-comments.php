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
                    Comments&nbsp;
                    <a href="/admin/create/comment/for/2" class="btn btn-create">
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
                            <th class="border-top-0">Author</th>
                            <th class="border-top-0">Date</th>
                            <th class="border-top-0">Status</th>
                            <th class="border-top-0" style="width: 230px"></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td><a href="/users/33">Deshmukh</a></td>
                            <td>@Genelia</td>
                            <td>Unpublished</td>
                            <td>
                                <a href="/admin/show/comment/33" class="btn btn-change">
                                    <i class="mdi me-2 mdi-eye"></i>
                                    Show
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
                            <td>@Ritesh</td>
                            <td>Published</td>
                            <td>
                                <a href="/admin/show/comment/33" class="btn btn-change">
                                    <i class="mdi me-2 mdi-eye"></i>
                                    Show
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
                            <td>@Govinda</td>
                            <td>Unpublished</td>
                            <td>
                                <a href="/admin/show/comment/333" class="btn btn-change">
                                    <i class="mdi me-2 mdi-eye"></i>
                                    Show
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
                            <td>@Hritik</td>
                            <td>Published</td>
                            <td>
                                <a href="/admin/show/comment/33" class="btn btn-change">
                                    <i class="mdi me-2 mdi-eye"></i>
                                    Show
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
                            <td>@Maruti</td>
                            <td>Published</td>
                            <td>
                                <a href="/admin/show/comment/33" class="btn btn-change">
                                    <i class="mdi me-2 mdi-eye"></i>
                                    Show
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
                            <td>@Sonu</td>
                            <td>Published</td>
                            <td>
                                <a href="/admin/show/comment/33" class="btn btn-change">
                                    <i class="mdi me-2 mdi-eye"></i>
                                    Show
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
                            <td>@Sonu</td>
                            <td>Unpublished</td>
                            <td>
                                <a href="/admin/show/comment/33" class="btn btn-change">
                                    <i class="mdi me-2 mdi-eye"></i>
                                    Show
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
                <br>
                <?php

                $theme->block('admin/pagination', ['paginator' => $comments]);

                ?>
            </div>
        </div>
    </div>
</div>
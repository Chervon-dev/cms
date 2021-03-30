<?php

$theme->header('Update post', true);

?>

    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Post</h4>
                <br>
                <div class="tab-pane" id="settings" role="tabpanel">
                    <form class="form-horizontal form-material mx-2">
                        <div class="form-group">
                            <label class="col-md-12" style="margin-bottom: 23px">Image</label>
                            <div class="example-3">
                                <label for="custom-file-upload" class="filupp">
                                    <span class="filupp-file-name js-value">Upload image</span>
                                    <input type="file" name="attachment-file" value="1" id="custom-file-upload">
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="width: 400px;">
                            <label class="col-md-12">Title</label>
                            <div class="col-md-12">
                                <input type="text" value="Title" class="form-control form-control-line ps-0">
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Description</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ps-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="col-md-12">Content</label>
                            <div class="col-md-12">
                                <textarea rows="5" class="form-control form-control-line ps-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</textarea>
                            </div>
                        </div>
                        <br>
                        <div class="form-group" style="overflow: visible">
                            <div class="col-sm-12">
                                <button class="btn btn-success text-white">Update post</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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

                        $theme->block('admin/pagination');

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

$theme->footer(true);
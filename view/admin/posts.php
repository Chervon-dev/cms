<?php

$theme->header('Posts', true);

?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div style="float: right">
                            <div class="row g-3 align-items-center" style="font-size: 16px">
                                <div class="col-auto">
                                    <label for="inputPassword6" class="col-form-label">Per page config:</label>
                                </div>
                                <div class="col-auto" style="font-weight: 100">
                                    <select class="form-select" aria-label="Default select example">
                                        <option value="1">5</option>
                                        <option value="2">7</option>
                                        <option value="3">10</option>
                                        <option value="3">15</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <h4 class="card-title">Posts</h4>
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
                                    <td>The Best Cat Toys</td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <button class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </button>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>The Best Cat Toys</td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <button class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </button>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>The Best Cat Toys</td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <button class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </button>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>The Best Cat Toys</td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <button class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </button>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>The Best Cat Toys</td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <button class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </button>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>The Best Cat Toys</td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <button class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </button>
                                        <button class="btn btn-delete">
                                            <i class="mdi me-2 mdi-delete"></i>
                                            Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>The Best Cat Toys</td>
                                    <td><a href="#">User</a></td>
                                    <td>March 15, 2021 at 6:19 PM</td>
                                    <td>
                                        <button class="btn btn-change">
                                            <i class="mdi me-2 mdi-account-edit"></i>
                                            Change
                                        </button>
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
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

                        <?php foreach ($comments->items() as $comment): ?>
                            <tr>
                                <td><?= $comment->id ?></td>
                                <td><a href="/users/<?= $comment->author_id ?>"><?= $comment->author ?></a></td>
                                <td><?= formatDate($comment->date, DATE_FORMAT) ?></td>
                                <td><?= $comment->is_publish == 1 ? 'Published' : 'Unpublished' ?></td>
                                <td>
                                    <a href="/admin/show/comment/<?= $comment->id ?>" class="btn btn-change">
                                        <i class="mdi me-2 mdi-eye"></i>
                                        Show
                                    </a>
                                    <button class="btn btn-delete">
                                        <i class="mdi me-2 mdi-delete"></i>
                                        Delete
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>

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
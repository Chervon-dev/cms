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

        <?php foreach ($posts as $id => $post): ?>

            <tr>
                <td><?= $post->id ?></td>
                <td><a href="/posts/<?= $post->alias ?>"><?= $post->title ?></a></td>
                <td><a href="/users/<?= $post->author_id ?>"><?= $post->author ?></a></td>
                <td><?= formatDate($post->date, DATE_FORMAT) ?></td>
                <td>
                    <a href="/admin/change/post/<?= $post->id ?>" class="btn btn-change">
                        <i class="mdi me-2 mdi-account-edit"></i>
                        Change
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
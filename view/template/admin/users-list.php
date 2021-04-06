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

        <?php foreach ($users as $id => $user): ?>
            <tr>
                <td><?= $user->id ?></td>
                <td><a href="/users/<?= $user->id ?>"><?= $user->name ?></a></td>
                <td><?= $user->email ?></td>
                <td><?= $user->role ?></td>
                <td>
                    <a href="/admin/change/user/<?= $user->id ?>" class="btn btn-change">
                        <i class="mdi me-2 mdi-account-edit"></i>
                        Change
                    </a>
                    <button class="btn btn-delete" onclick="deleteItem.user(<?= $user->id ?>)">
                        <i class="mdi me-2 mdi-delete"></i>
                        Delete
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>

        </tbody>
    </table>
</div>
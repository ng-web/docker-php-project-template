<?php $title = 'List of Users' ?>
<?php ob_start() ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Users</h1>
    <a href="/users/create" class="btn btn-primary">Add New User</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['role']) ?></td>
            <td>
                <a href="/users/show?id=<?= $user['id'] ?>" class="btn btn-info btn-sm">View</a>
                <a href="/users/update?id=<?= $user['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="users/delete?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php $content = ob_get_clean() ?>
<?php include __DIR__ . '/../layout.php' ?>
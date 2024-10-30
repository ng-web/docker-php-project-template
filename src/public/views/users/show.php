<?php $title = 'User Details' ?>
<?php ob_start() ?>

<div class="card mt-4">
    <div class="card-header">
        <h2><?= htmlspecialchars($user['username']) ?></h2>
    </div>
    <div class="card-body">
        <p><strong>Email:</strong> <?= htmlspecialchars($user['email']) ?></p>
        <p><strong>Role:</strong> <?= htmlspecialchars($user['role']) ?></p>
        <p><strong>Created At:</strong> <?= htmlspecialchars($user['created_at']) ?></p>
        <p><strong>Updated At:</strong> <?= htmlspecialchars($user['updated_at']) ?></p>
        <a href="/users/update?id=<?= $user['id'] ?>" class="btn btn-warning">Edit</a>
        <a href="/users" class="btn btn-secondary">Back to Users</a>
    </div>
</div>

<?php $content = ob_get_clean() ?>
<?php include __DIR__ . '/../layout.php' ?>
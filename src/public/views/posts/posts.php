<?php $title = 'List of Posts' ?>

<?php ob_start() ?>

<h1>List of Posts</h1>
<span>
    <a href="/create" target="_blank"></a>
</span>
<ul>
    <?php foreach ($posts as $post): ?>
    <li>
        <a href="/posts/show?id=<?= $post['id'] ?>">
            <?= $post['title'] ?>
        </a>
        | <a href="/posts/update?id=<?= $post['id'] ?>">Update</a>
        | <a href="/posts/delete?id=<?= $post['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
    </li>
    <?php endforeach ?>
</ul>

<?php $content = ob_get_clean() ?>

<?php include __DIR__ . '/../layout.php' ?>
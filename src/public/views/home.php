<?php $title = 'Home'; ?>
<?php ob_start(); ?>

<h1>Welcome to the Home Page</h1>
<p>This is the landing page of the application. Use the navigation to manage users or posts.</p>

<?php $content = ob_get_clean(); ?>
<?php include __DIR__ . '/layout.php'; ?>
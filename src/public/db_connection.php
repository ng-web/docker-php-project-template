<?php
require_once './models/Post.php';

$posts = get_all_posts();

require './views/posts/posts.view.php';
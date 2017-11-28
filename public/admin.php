<?php
define('ROOT', dirname(__DIR__));
require ROOT. '/vendor/autoload.php';
require ROOT. '/app/app.php';
App::load();

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'posts.index';
}

ob_start();
if ($page === 'admin') {
    require ROOT . '/app/views/admin/posts/admin.posts.index.html.twig';
} elseif ($page === 'posts.edit'){
    require ROOT . '/app/views/admin/posts/posts.edit.html.twig';
} elseif ($page === 'posts.add'){
    require ROOT . '/app/views/admin/posts/posts.edit.html.twig';
} elseif ($page === 'posts.delete'){
    require ROOT . '/app/views/admin/posts/admin.posts.index.html.twig';
}

$content = ob_get_clean();
require ROOT. '/app/views/templates/default.html.twig';






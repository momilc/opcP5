<?php
define('ROOT', dirname(__DIR__));
require ROOT. '/vendor/autoload.php';
require ROOT.'/app/App.php';
App::load();

$loader = new Twig_Loader_Filesystem(ROOT. '/app/Views/admin/');
$twig = new Twig_Environment($loader, [
    'cache' => false,
    'debug' => true
]);

if (isset($_GET['p'])) {
    $page = $_GET['p'];
} else {
    $page = 'posts.index';
}
$twig->addExtension(new App());
$twig->addExtension(new Twig_Extension_Debug());
$twig->addExtension(new Twig_Extensions_extension_Text());
$twig->addGlobal('current_page', $page);

ob_start();
if ($page === 'admin') {
    require ROOT . '/app/views/admin/posts/index.html.twig';
} elseif ($page === 'posts.edit'){
    require ROOT . '/app/views/admin/posts/edit.html.twig';
} elseif ($page === 'posts.add'){
    require ROOT . '/app/views/admin/posts/edit.html.twig';
} elseif ($page === 'posts.delete'){
    require ROOT . '/app/views/admin/posts/edit.html.twig';
} elseif ($page === 'login'){
    require ROOT . '/app/views/users/login.html.twig';
} elseif ($page === 'categories.index') {
    require ROOT . '/app/views/admin/categories/index.html.twig';
} elseif ($page === 'categories.edit'){
    require ROOT . '/app/views/admin/categories/edit.html.twig';
} elseif ($page === 'categories.add'){
    require ROOT . '/app/views/admin/categories/edit.html.twig';
} elseif ($page === 'categories.delete'){
    require ROOT . '/app/views/admin/categories/edit.html.twig';
}

$content = ob_get_clean();
require ROOT. '/app/views/templates/layout.html.twig';






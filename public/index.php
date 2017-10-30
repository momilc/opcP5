<?php
define('ROOT', dirname(__DIR__));
require ROOT. '/vendor/autoload.php';
require ROOT. '/app/app.php';
App::load();

$loader = new Twig_Loader_Filesystem([
    'posts' => ROOT. '/app/views/posts/',
    'categories' => ROOT. '/app/views/categories',
    'contact' => ROOT. '/app/views/contact',
    'users' => ROOT. '/app/views/users',
    'templates' => ROOT. '/app/views/templates',
    'admin.posts' => ROOT. '/app/views/admin/posts/',
    'admin.categories' => ROOT. '/app/views/admin/categories/'
    ]);
$twig = new Twig_Environment($loader, [

    'cache' => false,
    'debug' => true
]);

if(isset($_GET['p'])) {
    $page = $_GET['p'];
} else {

    $page = 'posts.index';
}

$twig->addExtension(new App());
$twig->addExtension(new Twig_Extension_Debug());
$twig->addExtension(new Twig_Extensions_extension_Text());
$twig->addGlobal('current_page', $page);


$page = explode('.', $page);

if ($page[0] == 'admin') {
    $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
    $action = $page[2];
} else {
    $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
    $action  = $page[1];
}
$controller = new $controller($twig);
$controller->$action();


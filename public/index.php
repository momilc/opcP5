<?php
define('ROOT', dirname(__DIR__));
require ROOT. '/vendor/autoload.php';
require ROOT. '/app/App.php';
App::load();

$loader = new Twig_Loader_Filesystem([
    'home' => ROOT. '/app/Views/home/',
    'posts' => ROOT. '/app/Views/posts/',
    'templates' => ROOT. '/app/Views/templates',
    'admin.posts' => ROOT. '/app/Views/admin/posts/',
    ]);

$twig = new Twig_Environment($loader, [

    'cache' => false,
    'debug' => true
]);

if(isset($_GET['p'])) {
    $page = $_GET['p'];
} else {

    $page = 'home.index';
}

$twig->addExtension(new App());
$twig->addExtension(new Twig_Extension_Debug());
$twig->addExtension(new Twig_Extensions_Extension_Text());
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


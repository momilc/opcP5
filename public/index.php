<?php
define('ROOT', dirname(__DIR__));
require ROOT. '/vendor/autoload.php';
require ROOT. '/app/app.php';
App::load();

$loader = new Twig_Loader_Filesystem(ROOT. '/app/Views/posts/');
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
$twig->addExtension(new Core\Controller\Controller($twig));
$twig->addExtension(new App\Controller\AppController($twig));
$twig->addExtension(new App\Controller\PostsController($twig));
$twig->addExtension(new App\Controller\UsersController($twig));
$twig->addExtension(new Twig_Extension_Debug());
$twig->addExtension(new Twig_Extensions_extension_Text());
$twig->addGlobal('current_page', $page);

/*$articles = App::getInstance()->getTable('Post')->last();
$categories = App::getInstance()->getTable('Category')->all();*/

$blog = new App\Controller\PostsController($twig);
$posts = $blog->Post->extract('extrait', 'url');
$categories = $blog->Category->extract('titre', 'url');

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
var_dump($posts,$categories);

/*



switch ($page) {

    case 'contact.index';
        echo $twig->render('contact.html.twig', ['name' => 'Marc', 'email' => 'demo@demo.com']);
        break;
    case 'posts.index';
        echo $twig->render('index.html.twig', [
            'articles' => $posts,
            'categories' => $categories
        ]);
        break;
    case 'posts.index.show';
        echo $twig->render('index.html.twig', [
            'articles' => $posts,
            'categories' => $categories
        ]);
        break;
    case 'users.login';
        echo $twig->render( 'login.html.twig', ['form' => $twig, 'categories' => $categories]);
        break;
    default;
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('/404.html.twig');
        break;
}*/



<?php
define('ROOT', dirname(__DIR__));
require ROOT. '/vendor/autoload.php';
require ROOT. '/core/Database/Database.php';
require ROOT. '/core/Controller/Controller.php';
require ROOT. '/core/HTML/Form.php';
require ROOT. '/app/app.php';
App::load();

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../app/Views/posts/');
$twig = new Twig_Environment($loader, [
    'cache' => false,
    'debug' => true
]);


if(isset($_GET['p'])) {
    $page = $_GET['p'];
} else {

    $page = 'index';
}


$twig->addExtension(new App());
$twig->addExtension(new Core\Database\Database());
$twig->addExtension(new Core\Controller\Controller($twig));
$twig->addExtension(new App\Controller\PostsController($twig));
$twig->addExtension(new core\HTML\Form());
$twig->addExtension(new Twig_Extension_Debug());
$twig->addExtension(new Twig_Extensions_extension_Text());
$twig->addGlobal('current_page', $page);

switch ($page) {

    case 'contact';
        echo $twig->render('contact.html.twig', ['name' => 'Marc', 'email' => 'demo@demo.com']);
        break;
    case 'index';
        echo $twig->render('index.html.twig', ['articles' => $twig]);
        break;
    case 'login';
        echo $twig->render( 'login.html.twig', ['form' => $twig]);
        break;
    default;
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('/404.html.twig');
        break;
}







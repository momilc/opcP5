<?php
    define('ROOT', dirname(__DIR__));
    require ROOT. '/vendor/autoload.php';
    require ROOT. '/app/app.php';
    App::load();

    if(isset($_GET['p'])) {
        $page = $_GET['p'];
    } else {

        $page = 'posts.index';
    }

    $page = explode('.', $page);

    $loader = new Twig_Loader_Filesystem( __DIR__. '/templates');
    $twig = new Twig_Environment($loader, [
        'cache' => false,
        'debug' => true
    ]);

    $twig->addExtension(new App());
    $twig->addExtension(new \Core\Database\MysqlDatabase('mon_blog'));
    $twig->addExtension(new Twig_Extension_Debug());
    $twig->addExtension(new Twig_Extensions_extension_Text());
    $twig->addGlobal('current_page', $page);


    if ($page[0] == 'admin') {
        $controller = '\App\Controller\Admin\\' . ucfirst($page[1]) . 'Controller';
        $action = $page[2];
    } else {
        $controller = '\App\Controller\\' . ucfirst($page[0]) . 'Controller';
        $action  = $page[1];
    }

    $controller = new $controller;
    $controller->$action();



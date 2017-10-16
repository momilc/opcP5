<?php
    require '../vendor/autoload.php';
    require '../core/Database/MysqlDatabase.php';
    define('ROOT', dirname(__DIR__));
    require '../app/app.php';

    App::load();

    if(isset($_GET['p'])) {
        $page = $_GET['p'];
    } else {

        $page = 'index';
    }


    $loader = new Twig_Loader_Filesystem( '../../app/Views/posts/', 'index.twig');
    $twig = new Twig_Environment($loader, [
        'cache' => false,
        'debug' => true
    ]);

    $twig->addExtension(new App());
    $twig->addExtension(new \Core\Database\MysqlDatabase('mon_blog'));
    $twig->addExtension(new Twig_Extension_Debug());
    $twig->addExtension(new Twig_Extensions_extension_Text());
    $twig->addGlobal('current_page', $page);


    switch ($page) {
        case 'index';
        echo $twig->render('index.twig',
            [
                'articles' => \Core\Database\MysqlDatabase::articles(),
                'categories' => \Core\Database\MysqlDatabase::categories()
            ]);
        break;
    }

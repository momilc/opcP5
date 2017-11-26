<?php

namespace  Core\Controller;
use \Twig_Environment;
use \Twig_Extension;

class Controller extends Twig_Extension {

    protected $viewPath;
    protected $template;
    private $twig;


    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    protected  function render($view, $variables = []) {
        ob_start();
        extract($variables); //$variables permet de chargers $posts et $categories de la classe Controller

            switch($view){
            case 'posts';
                echo require ($this->viewPath . str_replace('.', '/', $view). str_replace('.', '/', '/posts'). str_replace('', '.', $view));
                break;
            case 'categories';
                echo require ($this->viewPath . str_replace('.', '/', $view). str_replace('.', '/', '/categories/'). str_replace('', '.', $view));
                break;
            }
        $content = ob_get_clean();
        echo $this->twig->render($view, $variables);
    }

    protected function forbidden() {
        header('HTTP/1.0 403 Forbiden');
        die('Accès Interdit. Veuillez vous connecter!');
    }

    protected static function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }


}
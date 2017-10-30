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
        return $this->twig->render($view, $variables);
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
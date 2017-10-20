<?php

namespace  Core\Controller;
use \Twig_Environment;

class Controller  {

    protected $viewPath;
    protected $template;
    private $twig;

    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    protected  function render($view, $variables = []) {
       echo $this->twig->render($view, $variables);
    }

    protected function forbidden() {
        header('HTTP/1.0 403 Forbiden');
        die('Page introuvable');
    }

    protected static function notFound(){
        header('HTTP/1.0 404 Not Found');
        die('Page introuvable');
    }


}
<?php

namespace  Core\Controller;
use \Twig_Environment;
use \Twig_Extension;

class Controller extends Twig_Extension
{

    private $twig;


    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    protected  function render($view, $variables = []) 
    {
        extract($variables); //$variables permet de chargers $posts et $categories de la classe Controller
        echo $this->twig->render($view, $variables);
    }

    protected static function notFound()
    {
        header('HTTP/1.0 404 Not Found');
        return('Page introuvable');
    }

}

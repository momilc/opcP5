<?php

namespace App\Controller;

use Core\Controller\Controller;
use \App;
use \Twig_Environment;


class AppController extends Controller
{
    protected $template = 'default';

    public function __construct(Twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->viewPath = ROOT . '/app/Views/';
    }

    protected function loadModel($model_name) {
        $this ->$model_name = App::getInstance()->getTable($model_name);
    }
}
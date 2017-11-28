<?php

namespace App\Controller\Admin;

use Core\Auth\DbAuth;
use \App;


class AppController extends App\Controller\AppController {

    public function __construct(\Twig_Environment $twig)
    {
        parent::__construct($twig);

        App::getInstance();

    }
}
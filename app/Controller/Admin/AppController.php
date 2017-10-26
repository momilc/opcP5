<?php

namespace App\Controller\Admin;

use Core\Auth\DbAuth;
use \App;


class AppController extends App\Controller\AppController {

    public function __construct(\Twig_Environment $twig)
    {
        parent::__construct($twig);
        //Auth
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if(!$auth->logged()){
            $this->forbidden();
        }
    }
}
<?php

namespace App\Controller\Admin;

use Core\Auth\DbAuth;
use \App;

class AppController extends App\Controller\AppController {

    public function __construct()
    {
        parent::__construct();
        //Authentification
        $app = App::getInstance();
        $auth = new DBAuth($app->getDb());
        if(!$auth->logged()) {
            $this->forbidden();
        }
    }


}
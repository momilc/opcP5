<?php

namespace App\Controller;
use \App;

class HomeController extends AppController
{

    //
    public function __construct(\Twig_Environment $twig)
    {
        parent::__construct($twig);

    }

    //
    public function index()  
    {

        echo $this->render('index.html.twig');
    }

}

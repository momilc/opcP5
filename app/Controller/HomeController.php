<?php

namespace App\Controller;
use \App;

class HomeController extends AppController {


    public function __construct(\Twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->loadModel('Post');
    }


    public function index()  {

        $posts = $this->Post->last();
        echo $this->render('index.html.twig', ['articles' => $posts]);
    }



    public function show() {
        $posts = $this->Post->findwithCategory($_GET['id']);
        echo $this->render('show.html.twig', ['articles' => $posts]);
    }

}
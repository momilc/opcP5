<?php

namespace App\Controller;
use \App;

class PostsController extends AppController
{


    /**
     * PostsController constructor.
     *
     * @param \Twig_Environment $twig
     */
    public function __construct(\Twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->loadModel('Post');
    }


    public function index()  
    {

        $posts = $this->Post->last();
        echo $this->render('posts.html.twig', ['articles' => $posts]);

    }


    public function show() 
    {
        $posts = $this->Post->findwithCategory($_GET['id']);
        echo $this->render('show.html.twig', ['articles' => $posts]);
    }

}

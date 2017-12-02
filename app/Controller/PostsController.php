<?php

namespace App\Controller;
use \App;

class PostsController extends AppController {


	/**
	 * PostsController constructor.
	 * @param \Twig_Environment $twig
	 */
	public function __construct(\Twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->loadModel('Post');
        $this->loadModel('Category');
    }


    public function index()  {

        $posts = $this->Post->last();
        $categories = $this->Category->all();
        echo $this->render('posts.html.twig', ['articles' => $posts, 'categories' => $categories]);
    }

    public function category() {
        $categories = $this->Category->find($_GET['id']);
        if ($categories === false) {
            $this->notFound();
        }

        $posts = $this->Post->lastByCategory($_GET['id']);
        $categories = $this->Category->all();
        echo $this->render('category.html.twig', ['articles' => $posts, 'categories' => $categories]);

    }


    public function show() {
        $posts = $this->Post->findwithCategory($_GET['id']);
        echo $this->render('show.html.twig', ['articles' => $posts]);
    }

}
<?php

namespace App\Controller;
use \App;

class AuteursController extends AppController {


	/**
	 * PostsController constructor.
	 * @param \Twig_Environment $twig
	 */
	public function __construct(\Twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->loadModel('Post');
        $this->loadModel('Auteur');
    }


    public function index()  {

        $posts = $this->Post->last();
        $auteurs = $this->Auteur->all();
        echo $this->render('posts.html.twig', ['articles' => $posts, 'auteur' => $auteurs]);
    }

    public function auteur() {
        $auteurs = $this->Auteur->find($_GET['id']);
        if ($auteurs === false) {
            $this->notFound();
        }

        $posts = $this->Post->lastByCategory($_GET['id']);
        $auteurs = $this->Auteur->all();
        echo $this->render('posts.html.twig', ['articles' => $posts, 'auteur' => $auteurs]);

    }


    public function show() {
        $auteurs = $this->Post->findwithAuteur($_GET['id']);
        echo $this->render('show.html.twig', ['auteurs' => $auteurs]);
    }

}
<?php

namespace App\Controller\Admin;
use \App;
use \Core\HTML\BootstrapForm;

class AuteursController extends AppController
{



    public function __construct(\twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->loadModel('Auteur');
    }

    public function index() {
        $auteurs = $this->Auteur->all();
        echo $this->render( 'admin.posts.index.html.twig', ['auteurs' => $auteurs]);
    }

    public function add() {
        if(!empty($_POST)) {

            $result = $this->Post->create([

                'pseudo' => $_POST['pseudo'],


            ]);
            if($result) {
                echo $this->index();
            }
        }
        $this->loadModel('Post');
        $posts = $this->Post->extract('id', 'titre', 'contenu');
        $this->loadModel('Auteur');
        $auteurs = $this->Auteur->extract('id', 'pseudo');
        $form = new BootstrapForm($_POST);
        echo $this->render('posts.edit.html.twig', ['posts' => $posts, 'auteur' => $auteurs, 'form' => $form]);
    }

    public function edit(){

        if (!empty($_POST)) {
            $result = $this->Auteur->update($_GET['id'], [

                'pseudo' => $_POST['pseudo'],

            ]);
            if($result){
                echo $this->index();
            }
        }

        $auteur = $this->Auteur->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $auteurs = $this->Auteur->extract('id', 'pseudo');
        $form = new BootstrapForm($auteur);
        echo $this->render('posts.edit.html.twig', ['categories' => $categories, 'auteur' => $auteurs, 'form' => $form]);
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            if($result){
                echo $this->index();
            }
        }
    }
}
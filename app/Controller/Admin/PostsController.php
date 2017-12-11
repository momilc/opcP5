<?php

namespace App\Controller\Admin;
use \App;

use \Core\HTML\BootstrapForm;

class PostsController extends AppController
{



    public function __construct(\twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->loadModel('Post');


    }

    public function index() {
        $posts = $this->Post->all();
        echo $this->render( 'admin.posts.index.html.twig', ['articles' => $posts]);
    }

    public function add() {

        if(!empty($_POST)) {

            $result = $this->Post->create([
               'titre' => $_POST['titre'],
               'chapo' => $_POST['chapo'],
                'auteur' => $_POST['auteur'],
               'contenu' => $_POST['contenu'],
				'date' => date('Y/m/d H:i:s')

            ]);
            if($result) {
                echo $this->index();
            }
        }

        $form = new BootstrapForm($_POST);
        echo $this->render('posts.add.html.twig', ['form' => $form]);
    }

    public function edit(){

        if (!empty($_POST)) {

            $result = $this->Post->update($_GET['id'], [
               'titre' => $_POST['titre'],
               'chapo' => $_POST['chapo'],
               'contenu' => $_POST['contenu'],
                'auteur' => $_POST['auteur'],
				'date_modif' => date('Y/m/d H:i:s')
            ]);
            if($result){
                echo $this->index();
            }
        }

        $post = $this->Post->find($_GET['id']);
        $form = new BootstrapForm($post);
        echo $this->render('posts.edit.html.twig', ['article' => $post, 'form' => $form]);

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
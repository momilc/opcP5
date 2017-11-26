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
               'contenu' => $_POST['contenu'],
               'category_id' => $_POST['category_id'],
            ]);

            if($result) {
                echo $this->index();
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        echo $this->render('posts.edit.html.twig', ['categories' => $categories, 'form' => $form]);
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
               'titre' => $_POST['titre'],
               'contenu' => $_POST['contenu'],
               'category_id' => $_POST['category_id'],
            ]);
            if($result){
                echo $this->index();
            }
        }

        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);
        echo $this->render('posts.edit.html.twig', ['categories' => $categories, 'form' => $form]);
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
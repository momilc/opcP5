<?php

namespace App\Controller\Admin;
use \App;
use \Core\HTML\BootstrapForm;

class PostsController extends AppController
{

    public function __construct(\twig_Environment $twig)
    {
        parent::__construct($twig);
        return $this->loadModel('Post');
    }

    public function index() {
        $posts = $this->Post->all();
        return $this->render('admin.posts.index', compact('posts'));
    }

    public function add() {
        if(!empty($_POST)) {
            $result = $this->Post->create([
               'titre' => $_POST['titre'],
               'contenu' => $_POST['contenu'],
               'category_id' => $_POST['category_id'],
            ]);

            if($result) {
                return $this->index();
            }
        }
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($_POST);
        return $this->render('admin.posts.edit', compact('categories', 'form'));
    }

    public function edit(){
        if (!empty($_POST)) {
            $result = $this->Post->update($_GET['id'], [
               'titre' => $_POST['titre'],
               'contenu' => $_POST['contenu'],
               'category_id' => $_POST['category_id'],
            ]);
            if($result){
                return $this->index();
            }
        }

        $post = $this->Post->find($_GET['id']);
        $this->loadModel('Category');
        $categories = $this->Category->extract('id', 'titre');
        $form = new BootstrapForm($post);
        return $this->render('admin.posts.edit', compact('categories', 'form'));

    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Post->delete($_POST['id']);
            return $this->index();
        }
        return $this->render('admin.categories.index');
    }
}
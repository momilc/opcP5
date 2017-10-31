<?php

namespace App\Controller\Admin;

use \App;
use \Core\HTML\BootstrapForm;

class CategoriesController extends AppController
{
    public function __construct(\twig_Environment $twig)
    {
        parent::__construct($twig);
        $this->loadModel('Category');
    }

    public function index(){
        $items = $this->Category->all();
        echo $this->render('admin.categories.index.html.twig', ['items' => $items]);
    }

    public function add() {
        if (!empty($_POST)) {
            $result = $this->Category->create([
               'titre' => $_POST['titre']
            ]);
            if($result){
                echo $this->index();
            }
        }
        $form = new BootstrapForm($_POST);
        echo $this->render('categories.edit.html.twig', ['form' => $form]);
    }

    public function edit() {
        if (!empty($_POST)) {
            $result = $this->Category->update($_GET['id'],[
               'titre' => $_POST['titre']
            ]);
            if($result){
                echo $this->index();
            }
        }

        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
        echo $this->render('categories.edit.html.twig', ['form' => $form, 'categorie' => $category]);
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);

            if($result){
                echo $this->index();
            }
        }

        echo $this->render('admin.categories.index.html.twig');
    }
}

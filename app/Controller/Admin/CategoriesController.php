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
        return $this->render('admin.categories.index', compact('items'));
    }

    public function add() {
        if (!empty($_POST)) {
            $result = $this->Category->create([
               'titre' => $_POST['titre']
            ]);
                return $this->index();
        }
        $form = new BootstrapForm($_POST);
        return $this->render('admin.categories.edit', compact('form'));
    }

    public function edit() {
        if (!empty($_POST)) {
            $result = $this->Category->update([
               'titre' => $_POST['titre']
            ]);
                return $this->index();
        }

        $category = $this->Category->find($_GET['id']);
        $form = new BootstrapForm($category);
       return $this->render('admin.categories.edit', compact('form'));
    }

    public function delete() {
        if (!empty($_POST)) {
            $result = $this->Category->delete($_POST['id']);

                return $this->index();
        }
        return $this->render('admin.categories.index');
    }
}

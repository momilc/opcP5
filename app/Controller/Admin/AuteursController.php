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

	public function index(){
		$auteurs = $this->Auteur->all();
		echo $this->render('admin.posts.index.html.twig', ['auteur' => $auteurs]);
	}

	public function add() {
		if (!empty($_POST)) {
			$result = $this->Auteur->create([
				'pseudo' => $_POST['pseudo'],
			]);
			if($result){
				echo $this->index();
			}
		}
		$form = new BootstrapForm($_POST);
		echo $this->render('posts.edit.html.twig', ['form' => $form]);
	}

	public function edit() {
		if (!empty($_POST)) {
			$result = $this->Auteur->update($_GET['id'],[
				'pseudo' => $_POST['pseudo']
			]);
			if($result){
				echo $this->index();
			}
		}

		$auteur = $this->Auteur->find($_GET['id']);
		$form = new BootstrapForm($auteur);
		echo $this->render('posts.edit.html.twig', ['form' => $form]);
	}

	public function delete() {
		if (!empty($_POST)) {
			$result = $this->Auteur->delete($_POST['id']);

			if($result){
				echo $this->index();
			}
		}

		echo $this->render('admin.posts.index.html.twig');
	}
}

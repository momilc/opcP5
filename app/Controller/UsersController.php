<?php
namespace App\Controller;
use \App;
use \Core\Auth\DBAuth;
use \Core\HTML\BootstrapForm;

class UsersController extends AppController
{

    public function login() {

        $errors = false;
        if (!empty($_POST)) {
            $auth = new DBAuth(App::getInstance()->getDb());
            if($auth->login($_POST['username'], $_POST['password'])){
             header('Location: index.php?p=admin.posts.index');
            } else {
                $errors = true;
            }

        }
        $form = new BootstrapForm($_POST);
        echo $this->render('login.html.twig', ['form'=> $form, 'errors'=> $errors]);

    }

}
<?php

namespace App\Controller;
use \App;

class ContactController extends AppController {


    private $form;

    public function contact() {
        $forms = $this->form;
        return $forms;
    }

    public function index()  {
        $forms = $this->form;
        echo $this->render('contact.html.twig',  ['forms' => $forms, 'name' => 'Marc', 'email' => 'demo@demo.com']);
    }
}
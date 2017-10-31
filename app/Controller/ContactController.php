<?php

namespace App\Controller;
use \App;

class ContactController extends AppController {


    private $form;

    public function contact() {
        $form = $this->form;
        return $form;
    }

    public function index()  {
        $form = $this->form;
        echo $this->render('contact.html.twig',  ['form' => $form, 'name' => 'Marc', 'email' => 'demo@demo.com']);
    }
}
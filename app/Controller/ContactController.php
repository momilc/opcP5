<?php

namespace App\Controller;
use \App;

class ContactController extends AppController {


    private $form;

    public function contact() {
        $form = $this->form;
        return $form;
    }

}
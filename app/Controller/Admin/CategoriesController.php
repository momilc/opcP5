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


}

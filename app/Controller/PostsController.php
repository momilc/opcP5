<?php

namespace App\Controller;
use \App;

class PostsController extends AppController {

    public function __construct()
    {
        parent::__construct();
        $this->loadModel('Post');
        $this->loadModel('Category');
    }

    public function index()  {

        $posts = $this->Post->last();
        $categories = $this->Category->all();
        ['posts' => $posts, 'categories' => $categories]; //Portée des variables $posts et $ Categories
        $this->render('posts.index', compact('posts', 'categories')); //Avec compact() on crée le tableau contenant $posts et $categories

    }

    public function show() {
        $article = $this->Post->findwithCategory($_GET['id']);
        $this->render('posts.show', compact('article'));

    }
}
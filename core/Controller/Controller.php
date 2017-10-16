<?php

namespace  Core\Controller;


class Controller  {

    protected $viewPath;
    protected $template;

    protected  function render($view, $variables = []) {
        ob_start();
        extract($variables);
        require ($this->viewPath .str_replace('.', '/', $view) . '.php');
        $content = ob_get_clean();
        require ($this->viewPath . '/app/views/templates/' . $this->template . '.php');
    }


}
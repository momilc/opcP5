<?php

namespace Tutoriel;
/**
 * Created by PhpStorm.
 * User: LSM
 * Date: 30/09/2017
 * Time: 15:43
 */

class Autoloader
{
    static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }
    static function autoload($class){
        if (strpos($class, __NAMESPACE__. '\\') === 0)
        {
            $class = str_replace(__NAMESPACE__. '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            require 'class/' .$class. '.php';
        }

    }
}
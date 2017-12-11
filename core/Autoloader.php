<?php

namespace Core;
use \Twig_Extension;

/**
 * Class Autoloader
 *
 * @package opcP5
 */

    class Autoloader extends Twig_Extension
    {
    /**
     * Enregistrer un autoloader
     */

    public static function register()
    {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class)
    {
        if (strpos($class, __NAMESPACE__. '\\') === 0) {

            $class = str_replace(__NAMESPACE__. '\\', '', $class);
            $class = str_replace('\\', '/', $class);
            include __DIR__. '/' .$class. '.php';
        }
    }

}

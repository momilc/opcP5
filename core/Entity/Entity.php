<?php

namespace Core\Entity;

class Entity extends \Twig_Extension
{
    public function __get($key)
    {
        $method = 'get' .ucfirst($key);
        $this->$key = $this->$method();
        return $this->$key;
    }
}
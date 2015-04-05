<?php

class Singleton
{
    public static function getInstance(){
        static $instance = null;

        if (null === $instance) {
            $instance = new static();
            echo 'init new instance';
        } else {
            echo 'using existing instance';
        }

        return $instance;
    }
}

$obj = Singleton::getInstance();
$obj = Singleton::getInstance();

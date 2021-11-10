<?php
namespace App;

class Autoloader
{
    /**
     * Enregitre notre autoloader
     */
    static function register()
    {
        spl_autoload_register(
            [
            __CLASS__,
            'autoload'
        ]);
    }

    /**
     * Inclue le fichier correspondant a notre class en prenant le namespace en compte
     * @param $class string, nom nom de la classe a charger
     */
    static function autoload($class){
        $class = str_replace(__NAMESPACE__. '\\','',$class);
        $class = str_replace('\\','/',$class);


        /*
        var_dump($class);
        var_dump(__DIR__ . '/' . $class . '.php');
        var_dump(__NAMESPACE__);
        var_dump(__DIR__);
        */
        if(file_exists(__DIR__ . '/' . $class . '.php')){
           //var_dump('yeah');
            require __DIR__ . '/' . $class . '.php';
        }

    }
}
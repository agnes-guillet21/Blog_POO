<?php
use App\autoloader;
use App\config\Connect;
use App\Classes\PostManagerPOO;


// faire appel a l autoloadeer pour le mettre en place
require 'autoloader.php';
App\Autoloader::register();


$post = new PostManagerPOO();
//affichage page Home
$posts = $post->getListPost();

//Affichage
$title ="Accueil du blog";
$template = "view/home";

require ('view/layout.phtml');


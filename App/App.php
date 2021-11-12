<?php
session_start();

require_once './Autoloader.php';
App\Autoloader::register();

function vD($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit();
}


/* fonction de verif * */
function check_data($data) {
    $data = trim($data);// enlever les espaces  eviter les inputs avc juste des espaces
    $data = stripslashes($data); // elimine les \
    $data = htmlspecialchars($data); // converti les caracteres speciaux
    return $data;
}
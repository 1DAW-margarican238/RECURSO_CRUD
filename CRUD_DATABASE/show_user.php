<?php
session_start();
include_once('libraries/functions.php');

// Inicialización
boot();
if(!isset($_SESSION['rol'])){
    header('Location: ./login.php');
    exit;
}


// Lógica de negocio
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);  
// Obtenemos el ID de la querystring

if ($id !== false) {
    $db = conectarBD();
    $usuario = getUserByIdShow($db, $id);
} else {
    header("Location: ./index_user.php");
    exit;
}

if(!$usuario){
     header('Location: ./index_user.php');
    exit;
}

// Lógica de presentación
include_once('./templates/show_user.tpl.php');
?>

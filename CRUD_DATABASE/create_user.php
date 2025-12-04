<?php
session_start();
include_once('./libraries/functions.php');

//Inicialización
boot();
if(!isset($_SESSION['rol'])){
    header('Location: ./login.php');
    exit;
}

if($_SESSION['rol']!=='admin'){
    header('Location: ./index_user.php');
    exit;
}
//Lógica de negocio
$mensaje = '';
$db = conectarBD();
insertUser($db);






//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/create_users.tpl.php');
?>
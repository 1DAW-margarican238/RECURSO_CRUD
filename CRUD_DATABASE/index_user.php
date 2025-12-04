<?php
session_start();
include_once('./libraries/functions.php');

//Inicialización
boot();

//Lógica de negocio
//Lee CSV
$db = conectarBD();
$usuarios = getData("db", $db);
// dump($usuarios);
if(!isset($_SESSION['rol'])){
    header('Location: ./login.php');
    exit;
}

//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/index_users.tpl.php');
?>
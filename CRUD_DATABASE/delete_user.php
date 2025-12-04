<?php
session_start();
include_once('./libraries/functions.php');

boot();
$db = conectarBD();
if(!isset($_SESSION['rol'])){
    header('Location: ./login.php');
    exit;
}
$id = $_GET['id'];   
$usuario = getUserById($db, $id); 
if(!isset($_SESSION['rol'])){
    header('Location: ./login.php');
    exit;
}
if(!$usuario){
     header('Location: ./index_user.php');
    exit;
}
if($_SESSION['rol']!=='admin'){
    header('Location: ./index_user.php');
    exit;
}


if (isset($_POST['confirmar'])) {
    deleteUser($db, $id);
    header("Location: index_user.php");
    exit;
}

if (isset($_POST['volver'])) {
    header("Location: index_user.php");
    exit;
}

include('./templates/delete_user.tpl.php');

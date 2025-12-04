<?php
session_start();
include_once('./libraries/functions.php'); 

boot();
$db = conectarBD();
$nombre = filter_input(INPUT_POST, 'nombre');  
$password = filter_input(INPUT_POST, 'psw');
if(isset($_POST['login'])){
    loginUser($db,$nombre,$password);
}  


include_once('./templates/login.tpl.php');

?>

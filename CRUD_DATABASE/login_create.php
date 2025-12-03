<?php

include_once('./libraries/functions.php');

//Inicialización
boot();

//Lógica de negocio
$mensaje = '';
$db = conectarBD();

if (isset($_POST['crear'])) {
    insertUser($db);
    header("Location: login.php");
    exit;
}





//Lógica de presentación
//Presenta el html a partir de los datos en el CSV
include_once('./templates/login_create.tpl.php');
?>
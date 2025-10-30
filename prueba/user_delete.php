<?php

function getUsuario(){
    $usuarios = [];
    // $archivo = fopen($file, "r");
    // $keys = fgetcsv($archivo);
    $file = 'usuarios.csv';
    if(($archivo=fopen($file,'r'))!== false){
        while(($datos=fgetcsv($archivo))!== false){
            $usuarios[]=$datos;
        }
        fclose($archivo);
    }
    return $usuarios;

}



function deleteUser($usuario){
    $texto = "";
    $idGuardado = $_GET['id'];
    foreach($usuario as $fila){
        $id = $fila[0];
        
        if($id !== $idGuardado){
            foreach($fila as $datos){
            $texto .= $datos",";
            // al guardar los datos no se esriben bien
            }
        }
    };
$file = 'usuarios.csv';
     $archivoEscribir = fopen($file, "w");
        echo "<pre>";
        var_dump($texto);
        echo "</pre>";

        fwrite($archivoEscribir, $texto);
        
        $output = '
            <div>
                <a href="user_index.php" target="_blank">
                <button>Volver al inicio</button>
                </a>  
            </div>';
    return $output;  
}

$datosCSV = getUsuario();

$prueba = deleteUser($datosCSV);


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>user_delete</title>
</head>
<body>
    <?php
    echo $prueba;
    ?>
</body>
</html>
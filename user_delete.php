<?php
function deleteUser(){
    $texto ='id,nombre,email,rol,fecha'."\n";
    $file = 'usuarios.csv';
    $archivoLeer = fopen($file, "r");
    $keys = fgetcsv($archivoLeer);
    $idGuardado = $_GET['id'];

     echo "<pre>";
        var_dump($texto);
        echo "</pre>";

    while($fila = fgetcsv($archivoLeer)){
         $datos = array_combine($keys, $fila);
        if($datos['id'] !== $idGuardado){
            $texto .= $datos['id'].','.$datos['nombre'].','.$datos['email'].','.$datos['rol'].','.$datos['fecha']."\n";
        }
    };
        $archivoEscribir = fopen($file, "w");
        echo "<pre>";
        var_dump($texto);
        echo "</pre>";

        fwrite($archivoEscribir, $texto);
        
        $output = '
    <div>
        <a href="user_index.php" target="_blank">
         <button>Volver al inciio</button>
        </a>  
    </div>';
    return $output; 
   
}
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
    echo deleteUser();
    ?>
</body>
</html>







<?php

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

function getUsersMarkup(){
    $output= '';

    $file = 'usuarios.csv';
    $archivo = fopen($file, "r");
    $keys = fgetcsv($archivo);
    while($fila = fgetcsv($archivo)){
        $datos = array_combine($keys, $fila);
        $output .='<div class= "usuariosContenedor">
                <div class = "usuarioContenedor">
                <p> Nobre de usuario: '.$datos['nombre'].' </p> 
                <p>E-mail: '.$datos['email'].'</p>
                <p>Rol: '.$datos['rol'].' </p>
                <div>
                    <a href="user_info.php?id='.$datos['id'].'">
                        <button>Ver</button>
                    </a>   
                    <a href="user_edit.php?id='.$datos['id'].'">
                        <button>Editar</button>
                    </a> 
                      
                
                    <a href="user_delete.php?id='.$datos['id'].'">
                      <button>Eliminar</button>
                    </a>  
                </div>
            </div>';
        
    };
    $output.='
    <div>
        <a href="user_create.php" target="_blank">
         <button>Crear un nuevo usuario</button>
        </a>  
    </div>';
   
    return $output;
};


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
     <title>User_Index</title>
</head>
<style>

</style>
<body>
    <?php 
    echo getUsersMarkup();
    ?>
</body>
</html>
<?php
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

function getUserInfo(){
    $output= '';
    $file = 'usuarios.csv';
    $archivo = fopen($file, "r");
    $keys = fgetcsv($archivo);

    $idGuardado = $_GET['id'];
   
    while($fila = fgetcsv($archivo)){
         $datos = array_combine($keys, $fila);
        if($datos['id'] == $idGuardado){
             $output .='<div class= "usuariosContenedor">
                <div class = "usuarioContenedor">
                <p>ID: '.$datos['id'].'</p>   
                <p> NOMBRE DE USUARIO: '.$datos['nombre'].' </p>
                <p>E-mail: '.$datos['email'].'</p>
                <p>Rol: '.$datos['rol'].' </p>
                <p>Fecha de alta: '.$datos['fecha'].'</p>
            </div>';
        }
    }
    
     $output.='
    <div>
        <a href="user_index.php" target="_blank">
         <button>Volver al incio</button>
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
    <title>User_info</title>
</head>
<body>
    <?php echo getUserInfo()?>
</body>
</html>
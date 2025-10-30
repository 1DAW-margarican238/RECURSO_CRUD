<?php

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

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


function getUsuarioMarkup($usuarios){
    $output ='';
    $output .= '<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Fecha</th>
        <th>Acciones</th>
    </tr>';
foreach($usuarios as $fila){
    $id = $fila[0];
    $output .= '<tr>';
    foreach($fila as $datos){
        $output .= "<td>$datos</td>";
    
    }
    $output .= "<td> <a href='user_info.php?id=$id'><button>Ver</button></a>
    <a href='user_edit.php?id=$id'><button>Editar</button></a>
    <a href='user_delete.php?id=$id'><button>Eliminar</button></a></td>";
    
    $output .= '</tr>';
}

$output.= "
</table>
<tr>
<td> <a href='user_create.php?id=$id'><button>Crear</button></a></td>
</tr>";

return $output;

}

$datosCSV = getUsuario();

$getUsuariosMarkup = getUsuarioMarkup($datosCSV);


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
    echo $getUsuariosMarkup;
    ?>
</body>
</html>


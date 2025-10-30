<?php
function dump($var){
    global $miVariable;
    echo $miVariable;
    echo '<pre>'.print_r($var,1).'</pre>';
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


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



function getUserInfo($usuarios){
    if(empty ($usuarios)){
        return "<p>no hay usuarios</p>";
    }

    $output ="";
    $output.="<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Rol</th>
        <th>Fecha</th>
    </tr>";
    $idGuardado = $_GET['id'];
    foreach($usuarios as $fila){
        $id = $fila[0];
        if($id == $idGuardado){
            foreach($fila as $datos){
            $output .= "<td>$datos</td>";
            }
        }
    }
    $output.="</table>";
    $output.="
    <div>
        <a href='user_index.php'>
         <button>Volver al incio</button>
        </a>  
    </div>";
    return $output;
}

$datosCSV = getUsuario();
$prueba = getUserInfo($datosCSV);


// function getUserInfo(){
//     $output= '';
//     $file = 'usuarios.csv';
//     $archivo = fopen($file, "r");
//     $keys = fgetcsv($archivo);

//     $idGuardado = $_GET['id'];
   
//     while($fila = fgetcsv($archivo)){
//          $datos = array_combine($keys, $fila);
//         if($datos['id'] == $idGuardado){
//              $output .='<div class= "usuariosContenedor">
//                 <div class = "usuarioContenedor">
//                 <p>ID: '.$datos['id'].'</p>   
//                 <p> NOMBRE DE USUARIO: '.$datos['nombre'].' </p>
//                 <p>E-mail: '.$datos['email'].'</p>
//                 <p>Rol: '.$datos['rol'].' </p>
//                 <p>Fecha de alta: '.$datos['fecha'].'</p>
//             </div>';
//         }
//     }
    
//      $output.='
//     <div>
//         <a href="user_index.php" target="_blank">
//          <button>Volver al incio</button>
//         </a>  
//     </div>';
   
//     return $output;
// }

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
    <?php echo $prueba?>
</body>
</html>
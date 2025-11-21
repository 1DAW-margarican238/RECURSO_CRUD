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
    $output .= '
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-8">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 border border-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Rol</th>
                <th scope="col" class="px-6 py-3">Fecha</th>
            </tr>
        </thead>
        <tbody>';
    
    $idGuardado = $_GET['id'];
    foreach($usuarios as $fila){
        $id = $fila[0];
        if($id == $idGuardado){
            $output .= '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">';
            foreach($fila as $datos){
                $output .= '<td class="px-6 py-4">'.$datos.'</td>';
            }
            $output .= '</tr>';
        }
    }
    
    $output .= '
        </tbody>
    </table>
    </div>';

    $output .= '
    <div class="text-center my-6">
        <a href="user_index.php">
            <button class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                Volver al inicio
            </button>
        </a>
    </div>';
    
    return $output;
}

$datosCSV = getUsuario();
$prueba = getUserInfo($datosCSV);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User_info</title>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
    <div class="max-w-4xl mx-auto p-6">
        <?php echo $prueba ?>
    </div>
</body>
</html>

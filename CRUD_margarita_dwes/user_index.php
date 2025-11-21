<?php

function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}

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

function getUsuarioMarkup($usuarios){
    $output = '';
    $output .= '
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-8">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Nombre</th>
                <th scope="col" class="px-6 py-3">Email</th>
                <th scope="col" class="px-6 py-3">Rol</th>
                <th scope="col" class="px-6 py-3 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>';

    foreach($usuarios as $fila){
        $id = $fila[0];
        $output .= '<tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700">';
        for ($i = 1; $i <= 3; $i++) {
            $output .= '<td class="px-6 py-4">'.$fila[$i].'</td>';
        }
        $output .= '<td class="px-6 py-4 text-center">
            <a href="user_info.php?id='.$id.'" class="text-blue-600 dark:text-blue-500 hover:underline font-medium mx-1">Ver</a>
            <a href="user_edit.php?id='.$id.'" class="text-yellow-600 dark:text-yellow-500 hover:underline font-medium mx-1">Editar</a>
            <a href="user_delete.php?id='.$id.'" class="text-red-600 dark:text-red-500 hover:underline font-medium mx-1">Eliminar</a>
        </td>';
        $output .= '</tr>';
    }

    $output .= '
        </tbody>
    </table>
    </div>';

    $output .= '
    <div class="text-center my-6">
        <a href="user_create.php?id='.$id.'">
            <button class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg transition">
                Crear un nuevo usuario
            </button>
        </a>
    </div>';

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
    <script src="https://cdn.tailwindcss.com"></script>
    <title>User_Index</title>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
    <div class="max-w-5xl mx-auto p-6">
        <?php echo $getUsuariosMarkup; ?>
    </div>
</body>
</html>

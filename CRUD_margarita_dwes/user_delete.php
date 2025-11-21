<?php

function getUsuarios() {
    $usuarios = [];
    $file = 'usuarios.csv';

    if (($archivo = fopen($file, 'r')) !== false) {
        while (($datos = fgetcsv($archivo)) !== false) {
            $usuarios[] = $datos;
        }
        fclose($archivo);
    }

    return $usuarios;
}

function deleteUser($usuarios) {
    if (!isset($_GET['id'])) {
        return "<p class='text-red-600 text-center font-semibold'>Error, id no encontrada</p>";
    }

    $idEliminar = $_GET['id'];
    $usuarioEliminar = null;
    $usuariosCorectos = [];

    foreach ($usuarios as $fila) {
        if ($fila[0] == $idEliminar) {
            $usuarioEliminar = $fila;
        } else {
            $usuariosCorectos[] = $fila;
        }
    }

    if (!isset($_POST['confirmar'])) {
        $nombre = $usuarioEliminar ? $usuarioEliminar[1] : "desconocido";
        $output = '
        <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 mt-12 text-center">
            <h2 class="text-xl font-bold text-gray-800 dark:text-gray-100 mb-4">¿Seguro que quieres eliminar a <span class="text-red-600">'.$nombre.'</span>?</h2>
            <form method="post" action="user_delete.php?id='.$idEliminar.'" class="space-x-3">
                <button type="submit" name="confirmar" class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-lg transition">Sí, eliminar</button>
                <a href="user_index.php">
                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-lg transition">No, volver al inicio</button>
                </a>
            </form>
        </div>';
        return $output;
    }

    // continuar eliminar
    $file = 'usuarios.csv';
    if (($archivoEscribir = fopen($file, 'w')) !== false) {
        foreach ($usuariosCorectos as $fila) {
            fputcsv($archivoEscribir, $fila);
        }
        fclose($archivoEscribir);
    }

    $output = '
    <div class="max-w-lg mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-8 mt-12 text-center">
        <h3 class="text-2xl font-bold text-green-600 mb-4">Usuario eliminado </h3>
        <a href="user_index.php">
            <button type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition">Volver al inicio</button>
        </a>
    </div>';

    return $output;
}

$usuarios = getUsuarios();
$resultado = deleteUser($usuarios);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Eliminar usuario</title>
</head>
<body class="bg-gray-100 text-gray-900 dark:bg-gray-900 dark:text-gray-100">
    <?php echo $resultado ?>
</body>
</html>

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

function guardarUsuarios($usuarios) {
    $file = 'usuarios.csv';
    if (($f = fopen($file, 'w')) !== false) {
        foreach ($usuarios as $usuario) {
            fputcsv($f, $usuario);
        }
        fclose($f);
    }
}

function getFormsMarkup($usuario) {
    $id = $usuario[0];
    $nombre = $usuario[1];
    $email = $usuario[2];
    $rol = $usuario[3];

    $output = '
     <form action="user_edit.php?id='.$id.'" method="post" class="w-full max-w-lg mx-auto bg-white p-8 rounded-2xl shadow-md mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center uppercase">Editar Usuario</h2>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nombre">
                    Nombre
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight 
                    focus:outline-none focus:bg-white focus:border-gray-500" 
                    id="nombre" name="nombre" type="text" placeholder="Tu nombre" value="'.$nombre.'" required>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    Correo Electrónico
                </label>
                <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight 
                    focus:outline-none focus:bg-white focus:border-gray-500" 
                    id="email" name="email" type="email" placeholder="ejemplo@correo.com" value="'.$email.'" required>
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="rol">
                    Rol
                </label>
                <div class="relative">
                    <select id="rol" name="rol" required
                        class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight 
                        focus:outline-none focus:bg-white focus:border-gray-500">
                        <option value="usuario">Usuario</option>
                        <option value="administrador">Administrador</option>
                        <option value="editor">Editor</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-between items-center mt-8">
            <button type="submit" name="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-150">
                Guardar Cambios
            </button>
            <a href="user_index.php" 
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-lg transition duration-150">
                Volver al Inicio
            </a>
        </div>
    </form>';
    return $output;
}


function editUser($usuarios) {
    if (!isset($_GET['id'])) {
        echo "<div style='margin-top:10px; padding:10px; text-align:center; border-radius:8px; background-color:#ffe6e6; color:#b30000; font-weight:bold;'>
                Error: ID no encontrado
              </div>";
        return;
    }

    $id = $_GET['id'];
    $usuarioEditar = null;

    foreach ($usuarios as $usuario) {
        if ($usuario[0] == $id) {
            $usuarioEditar = $usuario;
            break;
        }
    }

    if (isset($_POST['submit'])) {
        $nuevoNombre = $_POST['nombre'];
        $nuevoEmail = $_POST['email'];
        $nuevoRol = $_POST['rol'];

        foreach ($usuarios as &$usuario) {
            if ($usuario[0] == $id) {
                $usuario[1] = $nuevoNombre;
                $usuario[2] = $nuevoEmail;
                $usuario[3] = $nuevoRol;
            }
        }

        guardarUsuarios($usuarios);
        echo "<div style='margin-top:10px; padding:10px; text-align:center; border-radius:8px; background-color:#e6ffed; color:#007f33; font-weight:bold;'>
                Usuario actualizado
              </div>";
    }

   return $usuarioEditar;

}



$usuarios = getUsuarios();
$usuarioEditar = editUser($usuarios);
$ejecutable = getFormsMarkup($usuarioEditar);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css"> 
    <title>user_edit</title>
        <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
   <?php echo $ejecutable ?>
</body>
</html>
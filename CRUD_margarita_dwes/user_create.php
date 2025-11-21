<?php
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}


function getFormsMarkup(){

   $output = '<form action="'.$_SERVER['PHP_SELF'].'" method="post" class="w-full max-w-lg bg-white p-8 rounded-2xl shadow-md mx-auto mt-10">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center uppercase">Crear Usuario</h2>

        <div class="mb-4">
            <label for="nombre" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Nombre:
            </label>
            <input type="text" id="nombre" name="nombre" required
                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500"
                placeholder="Tu nombre completo">
        </div>

        <div class="mb-4">
            <label for="email" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Correo Electrónico:
            </label>
            <input type="email" id="email" name="email" required
                class="appearance-none block w-full bg-gray-100 text-gray-700 border border-gray-300 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-indigo-500"
                placeholder="tucorreo@ejemplo.com">
        </div>

        <div class="mb-6">
            <label for="rol" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                Rol:
            </label>
            <select id="rol" name="rol" required
                class="block appearance-none w-full bg-gray-100 border border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-indigo-500">
                <option value="usuario">Usuario</option>
                <option value="administrador">Administrador</option>
                <option value="editor">Editor</option>
            </select>
        </div>
        <div class="flex justify-between items-center">
            <button type="submit" name="submit"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-150">
                Enviar
            </button>
            
            <a href="user_index.php" target="_blank"
                class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-6 rounded-lg shadow transition duration-150 text-center">
                Volver al inicio
            </a>
        </div>
    </form>';
    return $output; 
     
}

function getInsercionID(){
    $archivo = 'contID.csv';
    $lastID = (int)file_get_contents($archivo);
    $newID = $lastID+1 ;
    file_put_contents($archivo, $newID);
    return $newID;
}


function guardarUsers(){
    if(isset($_POST['submit'])){
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $rol = $_POST['rol'];


        //una función de php para validar el email (php.net)
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<div style='margin-top:10px; padding:10px; text-align:center; border-radius:8px; background-color:#ffe6e6; color:#b30000; font-weight:bold;'>
                El correo no es válido. </div>";
            return;
        };


        $usuario = array (
            getInsercionID(),
            $nombre,
            $email,
            $rol,
            date("Y-m-d H:i:s")
        );

    $file = 'usuarios.csv';
    $f = fopen($file, 'a');
       
        echo "<pre>";
        var_dump($usuario);
        echo "</pre>";

        fputcsv($f, $usuario);
        fclose($f);
        echo "<div style='margin-top:10px; padding:10px; text-align:center; border-radius:8px; background-color:#e6ffed; color:#007f33; font-weight:bold;'>
                Usuario guardado correctamente. </div>";

        
    }
}

$users = guardarUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>User_Create</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body>
    <div class="formsContainer">
        <?php  
        echo getFormsMarkup();
        $users; ?>
    </div>

</body>
</html> 
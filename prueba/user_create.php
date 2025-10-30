<?php
function dump($var){
    echo '<pre>'.print_r($var,1).'</pre>';
}


function getFormsMarkup(){

   $output = '<form action="'.$_SERVER['PHP_SELF'].'" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" required><br><br>

    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="rol">Rol:</label>
    <select id="rol" name="rol" required>
        <option value="usuario">Usuario</option>
        <option value="administrador">Administrador</option>
        <option value="editor">Editor</option>
    </select><br><br>


    <input type="submit" name="submit" value="Enviar">
  </form> <br>
  
    <div>
        <a href="user_index.php" target="_blank">
         <button>Volver al inicio</button>
        </a>  
    </div>';
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
        $usuario = array (
            $_POST['id'] = getInsercionID(),
            $_POST['nombre'],
            $_POST['email'],
            $_POST['rol'],
            date("Y-m-d H:i:s")
        );

    $file = 'usuarios.csv';
    $f = fopen($file, 'a');
       
        echo "<pre>";
        var_dump($usuario);
        echo "</pre>";

        fputcsv($f, $usuario);
        fclose($f);
        echo "<p>Usuario guardado</p>";

        
    }
}

$prueba = guardarUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>User_Create</title>
</head>
<body>
    <div class="formsContainer">
        <?php  
        echo getFormsMarkup();
        $prueba; ?>
    </div>

</body>
</html> 
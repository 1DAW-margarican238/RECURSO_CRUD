<?php
function getFormsMarkup(){

   $output = '<form action="'.editUser().'" method="post">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id" required><br><br>

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
         <button>Volver al inciio</button>
        </a>  
    </div>';
    return $output; 
     
}



function editUser(){
    if(!empty($_POST)){

    
    $texto ='id,nombre,email,rol,fecha';
    $file = 'usuarios.csv';
    $archivoLeer = fopen($file, "r");
    $keys = fgetcsv($archivoLeer);
    $idGuardado = $_GET['id'];
    
    while($fila = fgetcsv($archivoLeer)){
         $datos = array_combine($keys, $fila);
        if($datos['id'] == $idGuardado){
            $texto .= $_GET['id'].','.$_POST['nombre'].','.$_POST['email'].','.$_POST['rol'].','.date("Y-m-d H:i:s");
        } else {
            $texto .= $datos['id'].','.$datos['nombre'].','.$datos['email'].','.$datos['rol'].','.date("Y-m-d H:i:s");
        }
    }
    
    $archivoEscribir = fopen($file, "w");
        echo "<pre>";
        var_dump($texto);
        echo "</pre>";

        fwrite($archivoEscribir, $texto);

    

$formularioMarkup = getFormsMarkup();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css"> 
    <title>user_edit</title>
</head>
<body>
    <?php
    echo editUser();
    ?>
</body>
</html>
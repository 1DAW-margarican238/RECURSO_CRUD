<?php

function getFormsMarkup(){
   $output = '<form action="'.$_SERVER['PHP_SELF'].'" method="post">
    <label for="id">ID:</label>
    <input type="text" id="id" name="id"><br><br>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre"><br><br>

    <label for="email">Correo Electrónico:</label>
    <input type="email" id="email" name="email"><br><br>

    <label for="rol">Rol:</label>
    <select id="rol" name="rol">
        <option value="usuario">Usuario</option>
        <option value="administrador">Administrador</option>
        <option value="editor">Editor</option>
    </select><br><br>

    <label for="fecha">Fecha de alta:</label>
    <input type="date" id="fecha" name="fecha"><br><br>
    <input type="submit" value="Enviar">
  </form>';
    return $output; 
     
}


function guardarUsers(){

    $usuario = array ($_POST['id'],$_POST['nombre'],$_POST['email'],$_POST['rol'],$_POST['fecha']);

    
   
    if(isset($_POST['submit'])){
        $file = 'usuarios.csv';
        $f = fopen($file,'w');
        fputcsv($f, $usuario);
        fclose($f);
    };
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <title>Document</title>
</head>
<body>
    <div class="formsContainer">
        <?php echo getFormsMarkup(); ?>
        <?php  guardarUsers(); ?>
    </div>

</body>
</html> 
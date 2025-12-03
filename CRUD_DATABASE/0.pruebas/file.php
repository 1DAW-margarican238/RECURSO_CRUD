<?php 
function boot(){
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
}
function dump($var){
    echo '<pre>'.print_r($var,true).'</pre>';
}

boot();
$envio = filter_input(INPUT_POST,'submit');
if(isset($envio)){

}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>"method="post" ectype="multipart/form-data">
        <input type="file" name="fileupload" id="fileupload">
        <input type="submit" value="Crear" name="submit">
    </form>
</body>
</html>
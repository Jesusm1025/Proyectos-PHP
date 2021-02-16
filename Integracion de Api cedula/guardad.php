<?php
    if($_POST){
    $dir  = "datos";
    if(is_dir($dir)){
     mkdir($dir);
    }

    $contenido = json_decode($datos);
    file_put_contents("{$dir}/{$_POST['cedula']}.json", $contenido);
    header("Location:index.php");
    
    }
?>
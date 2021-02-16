<?php 
    $cedula = $_POST['cedula'];
    $url = "http://173.249.49.169:88/api/test/consulta/{$cedula}";
    $datos = file_get_contents($url);
    $datos = json_encode($datos);
?>
<?php

 $db_host="localhost";

 $db_usuario="root";

 $db_contra="";

 $db_nombre="itla_proyfinal";

 $conexion=new mysqli($db_host,$db_usuario,$db_contra);

 

 if($conexion){

  echo("Conecto");

 }

 else{

  echo("No se concecto a la base de datos");

 }

 mysqli_set_charset($conexion,"utf8");

 ?>
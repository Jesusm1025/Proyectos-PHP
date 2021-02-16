<?php
 include("libs/conexion2.php"); ?>
<html>
<head>
<title>Formulario</title>
</head>
<body>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

   <h4>
   Lista de consultas
   </h4>

<div class= "right-align">
<a href="consulta.php" class="btnNuevo btn-waves-effect waves-light btn"><i class="material-icons">Añadir nuevo paciente</i></a>
</div>

<h4><Font color = "black"> Consultas ingresadas</FONT></h4>
<div class= "right-align">


</div>
 <table>
   <thead>
     <tr>
         
        <th>Asunto</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Costo</th>
     </tr>
   </thead> 
   <tbody>

   <?php

    mysqli_select_db($conexion,$db_nombre) or die("Error al conectar con la base de datos");
    $registros=$conexion->query("SELECT * FROM  citas");
    while($registro=mysqli_fetch_array($registros))
    {
     
     echo "
             <tr>
           <td>{$registro['asunto']}</td>
           <td>{$registro['FechaAtencion']}</td>
           <td>{$registro['Duracion']}</td>
           <td>{$registro['costo']}</td>
           <td>
           </td>
          </tr>
     
     
     
     ";
  }

   ?>
   </tbody >
</table>
   </tbody >
</table>
<br><br>
<a href="consultar.php" class="btnNuevo btn-waves-effect waves-light btn"><i class="material-icons">Volver al boton buscar</i></a>

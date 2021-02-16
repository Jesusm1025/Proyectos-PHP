<?php
include("encabezado.php");
include("libs/utils.php");

?>
<h3>Citas recibidas</h3>
<a href="editar.php" class="btn btn-primary">Agregar cita</a>
<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Asunto</th>
      <th scope="col">Fecha</th>
	  <th scope="col">Hora</th>
	  <th scope="col">Costo</th>

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
          </tr>     
     ";
  }

?>
  </tbody>
</table>
<?php
include("pie.php");
?>

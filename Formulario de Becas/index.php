<!-- Jesus Miguel -->
<!-- Marcelino Kranwinkel -->
<!-- 2018-7289 -->
<!-- El dia para lograrlo es hoy -->

<?php
 include("encabezado.php"); 
 include("libs/utils.php"); 
 ?>


<h4>Solicitudes Recibidas</h4>
<div class= "right-align">
<a href="editar.php" class="btnNuevo btn-large waves-effect waves-light red"><i class="material-icons">add</i></a>

</div>
 <table>
   <thead>
     <tr>
         <td>Foto</td>
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Localizacion</th>              
     </tr>
   </thead> 
   <tbody class = "striped">
   <?php

    $datos = conexion::consulta_array('select*from personas');

    foreach($datos as $data){
     
     echo "
          <tr>
           <td><img style='height:30px;'src= 'fotos/{$data['id']}.jpg'></td>
           <td>{$data['cedula']}</td>
           <td>{$data['nombre']}</td>
           <td>{$data['apellido']}</td>
           <td>
                 <a href='buscar.php'><img src='https://img.icons8.com/pastel-glyph/64/000000/taxi-location.png'/></a>
                 
           </td>
           <td>
                 <a href='editar.php?ced={$data['id']}'><img src='https://img.icons8.com/pastel-glyph/64/000000/edit.png'/></a>
                 
           </td>
          </tr>
     
     
     ";
  }

    

   ?>
   </tbody >
</table>



<?php include("pie.php"); ?>

<script>
$(document).ready(function(){
   
    $('.btnNuevo').floatingActionButton();
  });

</script>


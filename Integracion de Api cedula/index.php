<?php 
/* JESUS MIGUEL MARCELINO
2018-7289
"Cada dia es una nueva oportunidad" */
    error_reporting(0);
    include('libs/utils.php');
    include('guardad.php');
    include('encabezado.php')
?>
<h3>Pacientes de covid-19</h3>
<p>Regristo de datos de pacientes del covid 19. Para el registro de un paciente
 solo debe de ingresar la cedula, y colocar la fecha en que el paciente dio positiva en la prueba.</p>
 <form method='POST'>
  <div class="row">
    <div class="col">
    <label >Cedula</label>
      <input type="text" class="form-control" name="cedula" placeholder="Ingresa tu cedula" maxlength="11">
    </div>
    <div class="col">
    <label for="fecha">Fecha que dio positivo la prueba</label>
      <input type="date" class="form-control" name="fecha">
    </div>
    <button type="submit" class="btn btn-success">Guardar</button>
  </div>
</form>
</br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Foto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Primer Apellido</th>
      <th scope="col">Segundo Apellido</th>
      <th scope="col">Edad</th>
    </tr>
  </thead>
  <tbody>
<?php
    $files = scandir('datos');

    foreach($files as $file){
      $ruta = "datos/{$file}";
     if (is_file($ruta)){
     $data = file_get_contents($ruta);
     $data = json_decode($data,true);
     $edad = calculaedad($data['FechaNacimiento']);
     echo "<tr>
            <td><img style='height:100px;'src='{$data['Foto']}'.jpg'></td>
            <td>{$data['Nombres']}</td>
            <td>{$data['Apellido1']}</td>
            <td>{$data['Apellido2']}</td>
            <td>{$edad}</td>
           </tr>";
      }
    }   
?>  
<?php
    include('encabezado.php');
    include('libs/utils.php');
function datos(){

    $cantidad ='1000';
    $url= "https://randomuser.me/api/?results={$cantidad}";
    $datos = file_get_contents($url);
    $datos = json_decode($datos);
   
    $num = 0;
    foreach($datos->results as $persona){ 
      $num++;
      $nombre=$persona->name->first;
      $apellido=$persona->name->last;
      $telefono=$persona->phone;
      $correo=$persona->email;
      $dirreccion=$persona->location->street->name;
      $latitud=$persona->location->coordinates->latitude;
      $longitud=$persona->location->coordinates->longitude;
      $nacionalidad=$persona->nat;
      $genero=$persona->gender;
      $fotolarge=$persona->picture->large;
      $zodiaco=signo_zodiaco($persona->dob->date);
      $edad=$persona->dob->age;
      $fotosmalls=$persona->picture->medium;
      $pais=$persona->location->country;


      $sql = "insert into infectados (nombre, apellido, telefono, correo, direccion, latitud, longitud, nacionalidad, genero, fotolarge, zodiaco, edad, fotosmalls, pais)
      values ('{$nombre}','{$apellido}','{$telefono}','{$correo}','{$dirreccion}','{$latitud}','{$longitud}','{$nacionalidad}','{$genero}','{$fotolarge}','{$zodiaco}','{$edad}','{$fotosmalls}','{$pais}')";

      $rsid = conexion::ejecutar($sql,true);
    } 
}

$sql = 'select * from infectados';

$datss = conexion::consulta_array($sql);

?>
<h2>Infectados Por El Covid-19</h2>
    </br>
    <p>La COVID‑19 es la enfermedad infecciosa causada por el coronavirus que se ha descubierto más recientemente. Tanto este nuevo virus como la enfermedad que provoca eran desconocidos antes de que estallara el brote en Wuhan (China) en diciembre de 2019. Actualmente la COVID‑19 es una pandemia que afecta a muchos países de todo el mundo.</p>
<a href="index.php" class="btn btn-success">Sincronizar</a>
<table id="table_id" class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Foto</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Edad</th>
      <th scope="col">Signo Zodiacal</th>
      <th scope="col">Foto del signo zodiacal</th>
      <th scope="col">Bandera de su nacionalidad</th>
      <th scope="col"></th>
    </tr>
    </thead>
    <tbody>            
<?php   
  datos()             
?>        
    </tbody>
</table>
<?php include('pie.php');?>

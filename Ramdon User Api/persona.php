<?php
    include('encabezado.php');
    include('libs/utils.php'); 
?>
<h2>Perfil de la persona infectada</h2>
</br>
<div class ="container" style="min-height:600px;">
<div class="float-right">
    <a href='tabla.php' class="btn btn-danger">Volver</a>
</div>
<div class='float-left'>
<div class="card" style="width: 20rem;">
<?php
    $sql = "select * from infectados where id = {$_GET['ced']}";
        
    $datos = conexion::consulta_array($sql);
    
    foreach($datos as $ver){

        echo"
        <img class='card-img-top' src = '{$ver['fotolarge']}'>
        <div class='card-body'>
        <h5 class='card-title'>Nombre completo: {$ver['nombre']} {$ver['apellido']}</h5>
        <h5 class='card-text'>Correo: {$ver['correo']}</h5>
        <h5 class='card-text'>Direcion: {$ver['direccion']}</h5>
        <h5 class='card-text'>Telefono: {$ver['telefono']}</h5>
        <h5 class='card-text'>Genero: {$ver['genero']}</h5>
        <h5 class='card-text'>Pais: {$ver['pais']}</h5>
        </div>
        </div>
        </div>
        </br>
        <div class='center-align'>
            <h5>Ubicacion en el mapa:</h5> <iframe width='680' height='543' src='https://www.openstreetmap.org/export/embed.html?bbox=-236.95312500000003%2C-79.17133464081945%2C237.65625000000003%2C79.17133464081945&amp;layer=mapnik&amp;marker={$ver['latitud']}%2C{$ver['longitud']}'></iframe>
        </div>
       ";
    }
    include('pie.php'); 
?>

<?php
    include('encabezado.php');
    if($_POST){

      $con = mysqli_connect($_POST['servidor'],$_POST['usuario'],$_POST['clave'],$_POST['nombrebase']) or die(
        "<script>
            alert('Conexion invalida favor verificar');
            window.location = 'install.php';
        </script>"
      );

      mysqli_query($con, "drop DATABASE `{$_POST['nombrebase']}`");
      mysqli_query($con, "CREATE DATABASE `{$_POST['nombrebase']}`");
      mysqli_query($con, "USE `{$_POST['nombrebase']}`");
      mysqli_query($con, "CREATE TABLE IF NOT EXISTS `huesped` (
        `id` int(11) NOT NULL,
        `nombre` varchar(100) NOT NULL,
        `apellido` varchar(100) NOT NULL,
        `pasaporte` int(9) NOT NULL,
        `pais` varchar(200) NOT NULL,
        `email` varchar(150) NOT NULL,
        `telefono` int(11) NOT NULL,
        `llegada` date NOT NULL,
        `salida` date NOT NULL,
        `habitaciones` int(9) NOT NULL
      ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

      mysqli_query($con, "
      ALTER TABLE `huesped`
      ADD PRIMARY KEY (`id`);");

      mysqli_query($con, "
      ALTER TABLE `huesped`
      MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;");

      $archivo = <<<Archivo
      <?php
        define('DB_HOST',"{$_POST['servidor']}");
        define('DB_USER',"{$_POST['usuario']}");
        define('DB_PASS',"{$_POST['clave']}");
        define('DB_NAME',"{$_POST['nombrebase']}");
Archivo;

              file_put_contents('libs/config.php', $archivo);
        echo "<script>
                window.location = 'registro.php';
        </script>";
    }
?>
<h3>Instalador Magico</h3>
<p>Aqui llenaras lo datos para que la aplicacion funcione. Recuerde, primero debe crear la bases de datos y luego el programa se encargara de crear las tablas correspondientes para que funcione la aplicacion.</p>
<form method="POST">
  <div class="form-group">
    <label for="servidor">Servidor</label>
    <input type="text" class="form-control" id="servidor" name="servidor" placeholder="Ingrese el nombre del su servidor">
  </div>
  <div class="form-group">
    <label for="usuario">Usuario</label>
    <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Ingrese el nombre de usuario">
  </div>
  <div class="form-group">
    <label for="clave">Clave</label>
    <input type="text" class="form-control" id="clave" name="clave" placeholder="Ingrese la clave">
  </div>
  <div class="form-group">
    <label for="nombrebase">Nombre de la base de datos</label>
    <input type="text" class="form-control" id="nombrebase" name="nombrebase" placeholder="Ingrese el nombre de la base de datos">
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Instalar</button>
  </div>
</form>
<?php
    include('pie.php');
?>
<?php
include("encabezado.php");

include('libs/utils.php');

if($_POST){
    $asunto = $_POST['asunto'];
    $idpaciente = $_POST['idpaciente'];
    $idmedico = $_POST['idmedico'];
    $fecha = $_POST['fecha'];
    $duracion = $_POST['duracion'];
    $observacion = $_POST['observacion'];
    $idestado = $_POST['idestado'];
    $costo = $_POST['costo'];

    $sql = "insert into citas (id, idpacientes, idmedicos, asunto, FechaAtencion, Duracion, Observacion, idestado, costo) values ('0','{$idpaciente}','{$idmedico}','{$asunto}','{$fecha}','{$duracion}','{$observacion}','{$idestado}','{$costo}');";
    if (mysqli_query(conexion::obj(), $sql)) {
        echo "cita almacenado. <br />";
    } else {
        echo "error en la ejecución de la consulta." . $sql . "<br>" . mysqli_error(conexion::obj());
  }
}
                  
$query = 'SELECT * FROM pacientes';
$result1 = mysqli_query(conexion::obj(), $query);

$sql = "SELECT * FROM medicos";
$result2 = mysqli_query(conexion::obj(), $sql);

$consulta = "SELECT * FROM estado";
$result3 = mysqli_query(conexion::obj(), $consulta);


?>
<form action="index.php" method="post">
  <div class="form-group">
    <label>Asunto</label>
    <input type="text" class="form-control" name="asunto" placeholder="Asunto">
  </div>
  <div class="form-group">
    <label>Paciente</label>
    <select class="custom-select" name="idpaciente">
    <option selected>Selecciona</option>
            <?php while($row1 = mysqli_fetch_array($result1)):;?>
            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
            <?php endwhile;?>
    </select>
    </div>
    <div class="form-group">
        <label>Medico</label>
        <select class="custom-select" name="idmedico">
        <option selected>Selecciona</option>
            <?php while($row1 = mysqli_fetch_array($result2)):;?>
            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
            <?php endwhile;?>
        </select>  
    </div>
    <div class="row">
    <div class="col">
      <input type="date" name="fecha" class="form-control">
    </div>
    <div class="col">
      <input type="time" name="duracion" class="form-control">
    </div>
  </div>
  <div class="form-group">
    <label>Observacion</label>
    <input type="text" class="form-control" name="observacion" placeholder="Observacion">
  </div>
  <div class="form-group">
        <label>Estado de la cita</label>
        <select class="custom-select" name="idestado">
            <?php while($row1 = mysqli_fetch_array($result3)):;?>
            <option value="<?php echo $row1[0];?>"><?php echo $row1[1];?></option>
            <?php endwhile;?>
    </select> 
    </div>
  <div class="form-group">
    <label>Costo</label>
    <input type="text" class="form-control" name="costo" placeholder="Costo">
  </div>
  <button type="submit" class="btn btn-primary">Agregar cita</button>
</form>
<?php
include("pie.php");
?>
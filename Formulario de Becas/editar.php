<?php


include('libs/utils.php');

$editando =  false;

if($_POST){
    
      foreach($_POST as &$valor){
            $valor = addslashes($valor);

      }

       extract($_POST);
    
$sql = "insert into personas (nombre, apellido, cedula, curso, ciudad, comentario)
values('{$nombre}', '{$apellido}', '{$cedula}', '{$curso}', '{$ciudad}','{$comentario}')";

 $rsid = conexion::execute($sql , true);
  
 
$archivo = $_FILES['foto'];
if ($archivo['error'] == 0){
      move_uploaded_file($archivo['tmp_name'], "fotos/{$rsid}.jpg");
}

header("Location:index.php");

}else if (isset($_GET['ced'])){

   $sql = "select*from personas where id = {$_GET{'ced'}}";

   $objs = conexion:: consulta_array($sql); 
    if(count($objs) > 0){
      $data = $objs;
      $data = $data;
      $_POST = $data;
      $editando = true;
    }
}

?>
<?php include("encabezado.php");


?>

<div class="row">
<form enctype="multipart/form-data" class="col s12" method = "post">
<center><?php
$cond = ['placeholder'=>'Escribe tu cedula'];
if($editando){
     $cond ['readonly'] = 'readonly';

}

echo asgInput('cedula','Cedula','',$cond); 
?></center>

<center><?= asgInput('nombre', 'Nombre'); ?></center>
<center><?= asgInput('apellido','Apellido'); ?></center>
<center><?= asgInput('curso','Curso que desea inscribirse'); ?></center>
<center><?= asgInput('ciudad','Ciudad de donde viene'); ?></center>
<center><?= asgInput('comentario','Comentario'); ?></center>
<center><?= asgInput('foto', '','',['type'=>'file']); ?></center>
<div class = "center-align">
<button class = "btn" type = "submit">
      Guardar
</button>
</form>
</div>

<script>
$('#cedula').mask('000-0000000-0');
</script>

<?php include("pie.php"); ?>
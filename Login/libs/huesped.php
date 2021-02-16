<?php
    class huesped{

        private $id = 0;
        private $nombre = "";
        private $apellido = "";
        private $pasaporte = "";
        private $pais = "";
        private $email = "";
        private $telefono = "";
        private $llegada = "";
        private $salida = "";
        private $habitaciones = 0;

        function __construct($id=0){
            $id = $id+0;
            if($id > 0){
                $sql = "select * from huesped where id = '{$id}'";
                $rs = mysqli_query(conexion::obj(), $sql);
                if(mysqli_num_rows($rs) > 0){
                    $fila = mysqli_fetch_array($rs);
                    
                    $this->id = $fila['id'];
                    $this->nombre = $fila['nombre'];
                    $this->apellido = $fila['apellido'];
                    $this->pasaporte = $fila['pasaporte'];
                    $this->pais = $fila['pais'];
                    $this->email = $fila['email'];
                    $this->telefono = $fila['telefono'];
                    $this->llegada = $fila['llegada'];
                    $this->salida = $fila['salida'];
                    $this->habitaciones = $fila['habitaciones'];
                    
                
                }
            }
        }

        static function listado(){
            $datos = array();
            $sql = "select * from huesped";
            $rs = mysqli_query(conexion::obj(), $sql);
            
            while($fila = mysqli_fetch_object($rs)){
            $datos[] = $fila;
            }
            return $datos;
        }

        function guardad(){
            if($this->id > 0){
                $sql = "
                UPDATE `huesped` 
                SET 
                `nombre`= '{$this->nombre}',
                `apellido`= '{$this->apellido}',
                `pasaporte`= '{$this->pasaporte}',
                `pais`= '{$this->pais}',
                `email`= '{$this->email}',
                `telefono`= '{$this->telefono}',
                `llegada`= '{$this->llegada}',
                `salida`= '{$this->salida}',
                `habitaciones`= '{$this->habitaciones}'
                 WHERE 
                 `id`= '{$this->id}';";
                $link = conexion::obj();
                mysqli_query($link, $sql);
                echo mysqli_error($link);
            }
            else{
                $sql = "insert into huesped values ('0','{$this->nombre}','{$this->apellido}','{$this->pasaporte}','{$this->pais}','{$this->email}','{$this->telefono}','{$this->llegada}','{$this->salida}','{$this->habitaciones}');";
                $link = conexion::obj();
                mysqli_query($link, $sql);
                echo mysqli_error($link);
                $this->id = mysqli_insert_id($link);                
            }
        }

        static function desactivar($id){
            $sql = "delete from huesped where id = '{$id}'";
            mysqli_query(conexion::obj(), $sql);
            echo "<SCRIPT type='text/javascript'>
                     alert('Estas seguro de que quieres borrar?');
                 </SCRIPT>";
        }

        function __toString(){
            return "Yo soy un huesped";
        }

        function __get($prop){
            if(isset($this->$prop)){
                return $this->$prop;
            }
            else{
                echo "No existe una propiedad llamada {$prop}";
            }
        }

        function __set($prop, $val){
            if(isset($this->$prop)){
                $this->$prop = $val;
            }
            else{
                echo "No existe una propiedad llamada {$prop}";
            }
        }
    }
?>
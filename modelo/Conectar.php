<?php
class Conectar{
    public $servidor="localhost";
    public $usuario="root";
    public $bd="parking";
    public $clave="";
    public function conexion(){
        $cone=mysqli_connect($this->servidor,$this->usuario, $this->clave, $this->bd);
        return $cone;
    }
}


?>
<?php
class Sentencia{
    public $sql;
    public $consulta;
    public $mensaje="se ejecutó";
    public $conexion;
    public $bd;
    
    public function __construct($sql,$conexion,$bd){
        $this->sql=$sql;
        $this->conexion=$conexion;
        $this->bd=$bd;
    }
   
    public function consulta(){
        mysqli_select_db($this->conexion,$this->bd);
        $res=mysqli_query($this->conexion,$this->sql);
        $filas=mysqli_fetch_array($res);
    }

    public function ins_ed_bd(){
        mysqli_select_db($this->conexion,$this->bd);
        mysqli_query($this->conexion,$this->sql);
        return $this->mensaje;
    }
    //modificar seria update tabla set where valor, parametro 
}

?>
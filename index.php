<?php
require_once("modelo/Sentencia.php");
require_once("modelo/Conectar.php"); 
session_start();
date_default_timezone_set("America/Bogota");
$obj=new Conectar();   
$conexion=$obj->conexion();
$_SESSION['pr']=array();
$_SESSION['placa']="";
$_SESSION['tvehiculo']="";


for ($i=1; $i <= 5 ; $i++) { 
    array_push($_SESSION['pr'],array($i,1,"","","",""));    
    $sql="INSERT INTO parking(idParking,estadoParking) VALUES ('$i',true);";
    $obj2= new Sentencia($sql,$conexion,$obj->bd);
    echo $obj2->ins_ed_bd();
}

header("Location: login_ad.php");
?>
<?php
session_start();
require_once("../modelo/Sentencia.php");
require_once("../modelo/Conectar.php"); 
date_default_timezone_set("America/Bogota");
$obj=new Conectar();   
$conexion=$obj->conexion();


$i=$_GET['i'];
$it=$i+1;
$time=date('H:i');

    if(isset($_SESSION['placa'])){
        $placa=$_SESSION['placa'];
        $tvehiculo=$_SESSION['tvehiculo']; 
        $_SESSION['pr'][$i][2]=$tvehiculo;
        $_SESSION['pr'][$i][3]=$placa;
        $sql2="INSERT INTO vehiculo(tipovehiculo,placaVehiculo) VALUES ('$tvehiculo','$placa')";
        $obj3= new Sentencia($sql2,$conexion,$obj->bd);
        echo $obj3->ins_ed_bd();

        $sql2="UPDATE parking SET placaVehiculo='$placa' WHERE (idParking='$it'); ";
        $obj3= new Sentencia($sql2,$conexion,$obj->bd);
        echo $obj3->ins_ed_bd();
    }

if($_SESSION['pr'][$i][1]==1){

    $_SESSION['pr'][$i][1]=0;   
    $_SESSION['pr'][$i][4]=$time;
    $sql="UPDATE parking SET estadoParking=false WHERE (idParking='$it');";
    $obj2= new Sentencia($sql,$conexion,$obj->bd);
    echo $obj2->ins_ed_bd();

    header("Location: ../vista/main.php");
}else{

    $placa=$_SESSION['placa'];

    $_SESSION['pr'][$i][1]=1;
    $sql="UPDATE parking SET estadoParking=true WHERE (idParking='$it');";
    $obj2= new Sentencia($sql,$conexion,$obj->bd);
    echo $obj2->ins_ed_bd();

    $_SESSION['pr'][$i][5]=$time;
    $entrada=$_SESSION['pr'][$i][4];
    $salida=$_SESSION['pr'][$i][5];

    if($_SESSION['pr'][$i][2]=="carro"){
        if(($salida-$entrada)<=0){
            $valor=5000;
        }else{
            $valor=($salida-$entrada)*5000;
        }
    }else if($_SESSION['pr'][$i][2]=="moto"){
        if(($salida-$entrada)<=0){
            $valor=4500;
        }else{
            $valor=($salida-$entrada)*4500;
        }
    }

    $sqlr="INSERT INTO registro(ingresoRegistro,salidaRegistro,idParking,valor) VALUES ('$entrada','$salida','$it','$valor');";
    $ir= new Sentencia($sqlr,$conexion,$obj->bd);
    $ir->ins_ed_bd();
    $_SESSION['pr'][$i][4]="";

    $sql="UPDATE parking SET placaVehiculo=null WHERE (idParking='$it'); ";
    $dp= new Sentencia($sql,$conexion,$obj->bd);
    $dp->ins_ed_bd();

    $_SESSION['pr'][$i][2]="";
    $_SESSION['pr'][$i][3]="";
    
    $sqla="DELETE FROM vehiculo WHERE (placaVehiculo='$placa');";
    $dr=new Sentencia($sqla,$conexion,$obj->bd);
    $dr->ins_ed_bd();
}

    header("Location: ../vista/main.php");
?>

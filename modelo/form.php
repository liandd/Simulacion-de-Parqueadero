<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../css/form.css">
        <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        
    </head>
    <body>
        <div class="main-content" style="margin-left: 1px;">
            <main>
                <div class="center">
                    <div class="title">INGRESO </div>
                        <form action="" method="post" id="login-form">
                            <div class="user-details">
                                
                                
                                <div class="input-box">
                                    <span class="details">Placa del Vehiculo</span>
                                    <input type="text" placeholder="Ingrese la placa: " required name="placa">
                                </div>
                            
                                <div class="vehicle-details">
                                    <br>
                                    <input type="radio" name="tvehiculo" value="carro" id="dott-1">
                                    <input type="radio" name="tvehiculo" value="moto" id="dott-2">
                                    <span class="vehicle-kind">Tipo de Vehiculo</span>
                                    <div class="category">
                                        <label for="dott-1">
                                            <span class="dot one"></span>
                                            <span class="vehicle" style="width:88px;">Carro</span>
                                        </label>
                                        <label for="dott-2">
                                            <span class="dot two"></span>
                                            <span class="vehicle" style="width:400px;">Moto</span>
                                        </label>
                                    </div>
                                </div>

                                <div class="button">
                                    <input type="submit" name="button-form"value="Confirmar Registro" id="login-form-submit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>
<?php
session_start();
if(isset($_POST['button-form'])){
    $_SESSION['placa']=$_POST['placa'];
    $_SESSION['tvehiculo']=$_POST['tvehiculo'];

    header("Location: ../vista/main.php");
}
?>
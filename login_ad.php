<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estilos.css">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
</head>
</head>
<body>
    <div class="center">
        <h1>Login</h1>
        <form action="" method="post">
                <div class="txt_field">
                    <input type="text" name="user" required>
                    <label >Nombre de usuario</label>
                    <span></span>
                </div>
                <div class="txt_field">
                    <input type="password" name="clave" required="required">
                    <label>Contraseña</label>
                    <span></span>
                </div>
                <br>
                    <br><br>
                    <input type="submit" name="button" value="Enviar">
        </form>
    </div>
</body>
</html>

<?php
session_start();
$u="admin";
$c=sha1("1234");
if (isset($_POST['button'])){
    $user = $_POST['user'];
    $clave = sha1($_POST['clave']);
    if($user==$u&&$clave==$c){
        header("Location: vista/main.php");
    }else{
        echo "<script>alert('usuario o contraseña incorrectos');
        window.location='login_ad.php' </script>";
    } 
}
?>

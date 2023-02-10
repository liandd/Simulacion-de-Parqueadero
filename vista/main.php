<?php session_start();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">

</head>

<body>
    <input type="checkbox" id="nav-toggle">
    <div class="sidebar">
        <div class="sidebar-brand">
            <h2><span class="lab la-spotify"></span> <span> Trabajo Final</span></h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-user-circle"></span>
                        <span>Dashboard</span></a>
                </li>
                <li>
                    <a href="../login_ad.php"><span class="las la-sign-out-alt"></span>
                        <span>Cerrar Sesion</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <header>
            <h2>
                <label for="nav-toggle">
                    <span class="las la-bars"></span>
                </label>
                Dashboard, Admin
            </h2>

            <div class="user-wrapper">
                <img src="../img/blandonferxxo.png" width="40px" height="40px" alt="">
                <div>
                    <small>Que gusto verte!</small>
                    <h4>Bienvenido <?php echo "blandix"; ?></h4>
                </div>
            </div>
        </header>
        <main>

            <div class="recent-grid">
                <div class="inventario">
                    </div>
                    <div class="Mensajes">
                        </div>
                        <div class="parqueadero">
                        <div class="card">
                            <div class="p-header">
                                <h3>Parqueaderos</h3>
                            </div>
                            <div class="card-header">
                            <button onclick="document.location.href='../modelo/form.php';">+ Agregar Registro</button>
                        </div>


                            
                        <div class="card-body">
                            <div class="table-responsive">
                            <table width="100%">
                                <thead>
                                    <tr>

                                    <td>IdParking</td>
                                    <td>Estado</td>
                                    <td>Tipo de vehiculo</td>
                                    <td>Placa</td>
                                    <td>Hora Ingreso</td>
                                    <td></td>

                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    for ($i=0; $i < count($_SESSION['pr']); $i++) { 
                                        if($_SESSION['pr'][$i][0]!=null){
                                    ?>
                                 <tr>
                                    <td><?php echo $_SESSION['pr'][$i][0];?></td>
                                    <td><?php 
                                        if($_SESSION['pr'][$i][1]==1){
                                            echo "disponible";
                                        }else if($_SESSION['pr'][$i][1]==0){
                                            echo "ocupado";
                                        }
                                        
                                    ?></td>
                                    <td><?php echo $_SESSION['pr'][$i][2];?></td>
                                    <td><?php echo $_SESSION['pr'][$i][3];?></td>
                                    <td><?php echo $_SESSION['pr'][$i][4];?></td>
                                    <td><a href="../controlador/actualizar.php?i=<?php echo $i?>">Actualizar</a></td>
                                 </tr>
                                    <?php
                                    }
                                    }
                                ?>
                                </tbody>
                            </table>
                            
                        </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
<?php
session_start(); // Iniciar la sesión si no se ha iniciado aún

// Verificar si el usuario está autenticado
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    // Obtener el nombre del usuario de la sesión
    $nombre = $_SESSION['user_data']['nombre']; // Ajusta según la estructura de tu array de datos de usuario
} else {
    // Si el usuario no está autenticado, redirigir al formulario de inicio de sesión
    header("Location: index.php"); // Ajusta el nombre del archivo de inicio de sesión si es necesario
    exit; // Asegurar que el script se detenga después de la redirección
}
$db=mysqli_connect("localhost","root","","mydb");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Administrador</title>
    <link href="admin_css.css" rel="stylesheet" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Lilita+One&family=Patua+One&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Amaranth&family=Secular+One&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-latest.js"></script>
    <script src="admin.js"></script>
</head>

<body>

<header class="header">
    <h1>IEST DEPORTES</h1>
    <div class="bienvenido">
        <h2>Bienvenid@ <?php echo $_SESSION['nombre']?></h2>
    </div>
</header>

<div class="col-md-8">

                    <table class="table table-border">

                        <thead>
                            <tr>
                                <th>Numero Solicitud</th>
                                <th>Deporte</th>
                                <th>Descripcion</th>  <!-- FALTA AGREGAR NOMBRES DE USUARIO Y ID DEL USUARIO --> 
                                <th>Status</th>       <!-- TMB EN LUGAR DE SACAR EL ID DEL DEPORTE QUE SAQUE EL NOMBRE -->
                            </tr>
                        </thead>
                        <tbody>

                            <?php

                        $query = "SELECT * FROM solicitudes;";
                        $result_usuario = mysqli_query($db, $query);
                        while($row = mysqli_fetch_assoc($result_usuario)){ ?>
                                <!--recorro mi tabla usuario-->
                                <tr>
                                    <td>
                                        <?php echo $row['idSolicitudes']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['iddeporte']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['motivo_solicitud']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['estatus']; ?>
                                    </td>
                                </tr>
                                
                                <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

<nav>
    <a href="admin_index.php">Regresar</a>
</nav>
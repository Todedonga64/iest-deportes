<?php
session_start();
$db=mysqli_connect("localhost","root","","iest_deportes");
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
        <h2>Bienvenid@ <?php echo $_SESSION['usuario']?></h2>
    </div>
</header>

<div class="col-md-8">

                    <table class="table table-border">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Deporte</th>
                                <th>Motivo</th>
                                <th>Status</th>
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
                                        <?php echo $row['id']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['deporte']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['motivo']; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['stat']; ?>
                                    </td>
                                </tr>
                                
                                <?php } ?>

                        </tbody>

                    </table>

                </div>

            </div>

<nav>
    <a href="admin_index.php">Cerrar sesión</a>
</nav>
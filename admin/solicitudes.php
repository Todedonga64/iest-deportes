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

$query = "SELECT * FROM solicitudes;";
$result_usuario = mysqli_query($db, $query);
while($row = mysqli_fetch_assoc($result_usuario)){

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



<body>
  <br>
  <div class="container">
    <h1>Solicitudes</h1>
    <br>
    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table">
          <thead>
            <tr>
            <th>Solicitud</th>
            <th>Nombre</th>
            <th>Correo</th>
            <th>Celular</th>
            <th>Deporte</th>
            <th>Motivo</th>
            <th>Descripcion</th>  
            <th>Status</th> 
            </tr>
          </thead>
          <tbody>
            <tr>
                <td>
                    <?php echo $row['idSolicitudes']; ?>
                </td>
                <td>
                    <!--<?php echo $row['nombre']; ?> -->
                </td>
                <td>
                    <?php echo $row['Email']; ?>
                </td>
                <td>
                    <?php echo $row['Cel']; ?>
                </td>
                <td>
                    <!--<?php echo $row['iddeporte']; ?>-->
                </td>
                <td>
                    <?php echo $row['razon_solicitud']; ?>
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
  </div>
</body>

<div>
    <footer>
        <a href="admin_index.php">Regresar</a>
    </footer>
</div>
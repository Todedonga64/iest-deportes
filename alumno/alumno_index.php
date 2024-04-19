<?php
session_start();
$db=mysqli_connect("localhost","root","","iest_deportes");

if (!$db) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Verificar si se ha enviado el formulario
if (isset($_POST['solicitud-btn'])) {
    // Recibir datos del formulario
    $deporte = $_POST['deporte'];
    $motivo = $_POST['motivo'];
    $id = $_SESSION['id'];

    // Consulta para insertar datos en la tabla
    $sql = "INSERT INTO solicitudes VALUES ('$id','$deporte', '$motivo','pendiente')";

    // Ejecutar la consulta
    if (mysqli_query($db, $sql)) {
        $_SESSION['alert']="Solicitud ingresada correctamente";
    } else {
        $_SESSION['alert']="Error al ingresar la solicitud";
    }
}

// Cerrar la conexión
mysqli_close($db);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Alumnos</title>
    <link href="alumno_css.css" rel="stylesheet" type="text/css">
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

<button id="open">Crear una Solicitud</button>

<div class="modal-container" id="modal_container">
    <div class="modal">
        <h1>Nueva Solicitud</h1>
        <form method="post" action="alumno_index.php">
            <label for="deporte">Selecciona un deporte:</label>
            <select name="deporte" id="deporte">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="Ajedrez">Ajedrez</option>
                <option value="Baile">Baile</option>
                <option value="Basquetbol">Basquetbol</option>
                <option value="Futbol">Futbol</option>
                <option value="Karate">Karate</option>
                <option value="Porristas">Porristas</option>
                <option value="Tiro con arco">Tiro con arco</option>
                <option value="Volleyball">Volleyball</option>
            </select>
            <label for="motivo">Motivo de solicitud:</label>
            <select name="motivo" id="motivo">
                <option value="" disabled selected>Selecciona una opción</option>
                <option value="actividad">Actividad deportiva</option>
                <option value="cuadro">Cuadro de honor</option>
            </select>
            <input type="submit" class="fadeIn fourth" id="close" name="solicitud-btn" value="Envíar">
        </form>
    </div>
</div>

<nav>
    <a href="logout.php">Cerrar sesión</a>
</nav>

</body>
</html>
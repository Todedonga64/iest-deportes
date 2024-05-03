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

/*
// Verificar si se ha enviado el formulario
if (isset($_POST['solicitud-btn'])) {
    // Recibir datos del formulario
    $deporte = $_POST['deporte'];
    $motivo = $_POST['motivo'];
    $id = $_SESSION['id'];

    // Consulta para insertar datos en la tabla
    $sql = "INSERT INTO solicitudes VALUES ('$id','$deporte', '$motivo','pendiente')";

    // Ejecutar la consulta
    try {
        if (mysqli_query($db, $sql)) {
            echo '<script>alert("Solicitud ingresada correctamente");</script>';
        } else {
            $_SESSION['alert']="Error al ingresar la solicitud";
        }
    } catch (mysqli_sql_exception $e) {
        // Si hay un error de duplicación de clave primaria, mostrar un mensaje de error
        echo '<script>alert("Solo puedes tener una solicitud activa");</script>';
    }
}*/
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
</head>

<body>

<header class="header">
    <h1>IEST DEPORTES</h1>
    <div class="bienvenido">
        <h2>Bienvenid@ <?php echo $_SESSION['nombre']?></h2>
    </div>
</header>

        
<div class="container_formulario">
        <h1>Nueva Solicitud</h1>
    <form action="enviosolicitudes.php" class="form-contact" method="post" tabindex="1">
        <input type="email" class="form-contact-input" name="email" placeholder="Email" required />
        <input type="tel" class="form-contact-input" name="tel" placeholder="Teléfono" />

        <select name="deporte" class="form-contact-input" required>
            <option value="" disabled selected>Selecciona un deporte</option>
            <option value="1">Fútbol Varonil</option>
            <option value="2">Fútbol Femenil</option>
            <option value="3">Ajedrez</option>
            <option value="4">Básquetbol Varonil</option>
            <option value="5">Básquetbol Femenil</option>
        </select>

        <select name="motivo" class="form-contact-input" required>
            <option value="" disabled selected>Selecciona un motivo de solicitud</option>
            <option value="actividad">Actividad deportiva</option>
            <option value="cuadro">Selección deportiva</option>
        </select>

        <textarea class="form-contact-textarea" name="conteudo" placeholder="Deja un mensaje" required></textarea>
        <button type="submit" class="form-contact-button">Enviar</button>
    </form>
</div>

<div>
    <a href="logout.php">Cerrar sesión</a> 
</div>

<script src="alumnojs.js"></script>

</body>
</html>
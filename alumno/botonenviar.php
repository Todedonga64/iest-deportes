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

// Obtener los datos del formulario
$email = $_POST['email'];
$tel = $_POST['tel'];
$deporte_id = $_POST['deporte'];
$motivo = $_POST['contenido'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO Solicitudes (iddeporte, motivo_solicitud) VALUES ('$deporte_id', '$motivo')";

if ($conn->query($sql) === TRUE) {
    echo "Solicitud enviada correctamente";
} else {
    echo "Error al enviar la solicitud: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>

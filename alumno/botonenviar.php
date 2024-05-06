<?php
require_once("../conexiondb.php");

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

// Acceder al valor de 'id_iest'
$id_acceso = $_SESSION['user_data']['idAcceso'];

// Obtener los datos del formulario
$email = $_POST['email'];
$tel = $_POST['tel'];
$deporte_id = $_POST['deporte'];
$motivo = $_POST['contenido'];
$razon = $_POST['motivo'];

// Insertar los datos en la base de datos
$sql = "INSERT INTO solicitudes (idSolicitudes, iddeporte, motivo_solicitud, estatus, Email, Cel, razon_solicitud)
VALUES ('$id_acceso','$deporte_id', '$motivo','PENDIENTE','$email','$tel','$razon')";

if ($conn->query($sql) === TRUE) {
    $response = array("success" => true, "message" => "Se envio correctamente el Formulario");
    //GUARDA LA INFORMACION DEL $RESULT en session global
    echo json_encode($response);  
} else {
    $response = array("success" => false, "message" => "Error");
    //GUARDA LA INFORMACION DEL $RESULT en session global
    echo json_encode($response); 
}

// Cerrar la conexión
$conn->close();
?>

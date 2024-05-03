<?php
require_once("conexiondb.php");
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    switch ($_POST["key"]) {
        case 1:
            login();
            break;
        }

}else{
    switch ($_GET["key"]) {
        case 2:
            validar_jerarquia();
            break;
        }
}


function login()
{
    $usuario = $_POST['id_iest'];
    $pass = $_POST['contraseña'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "mydb"; // Reemplaza con el nombre de tu base de datos
    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $query = "SELECT * FROM acceso 
    INNER JOIN alumno on id_iest=idIEST
    WHERE id_iest = ? AND contraseña = ?";

    // Preparar la sentencia
    $stmt = $conn->prepare($query);

    // Vincular los parámetros a la sentencia
    $stmt->bind_param("ss", $usuario, $pass); // 'ss' indica que ambos parámetros son strings

    // Ejecutar la sentencia
    $stmt->execute();

    // Obtener los resultados
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        // Guardar la información en la sesión global
        $_SESSION['logged_in'] = true;
        $_SESSION['user_data'] = $result->fetch_assoc(); // Guardar los datos del usuario en la sesión
        $_SESSION['tipo_usuario'] = $_SESSION['user_data']['tipo_usuario'];
        $_SESSION['nombre'] = $_SESSION['user_data']['nombre'];
        // Si hay al menos un registro, el usuario y la contraseña son correctos
        $response = array("success" => true, "message" => "Iniciaste Sesion");
        //GUARDA LA INFORMACION DEL $RESULT en session global
        echo json_encode($response);  
        
   

 
    } else {
        // Si no hay registros, el usuario o la contraseña son incorrectos
        $response = array("success" => false, "message" => "Contraseña incorrecta");
        echo json_encode($response);
    }

    // Cerrar la sentencia
    $stmt->close();

    // Cerrar la conexión
    $conn->close();

    
}
function validar_jerarquia(){
    session_start();
    switch($_SESSION['tipo_usuario']){
        case 1:
            header("Location:alumno/alumno_index.php");
            break;
        case 2:
            header("Location: /direccion de la jerarquia1");
            break;    
        case 3:
            header("Location: /direccion de la jerarquia1");
            break;
        case 4:
            header("Location:admin/admin_index.php");
            break;
    }
}

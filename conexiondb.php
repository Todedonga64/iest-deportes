<?php
// Parámetros de conexión
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

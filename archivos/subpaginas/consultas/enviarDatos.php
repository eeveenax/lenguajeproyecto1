<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);


/* */
$servidor = "localhost";
$usuario = "root"; 
$contrasena = "";
$basedatos = "formulario_contacto";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $basedatos);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    /* */
    $nombre = $conn->real_escape_string(trim($_POST['nombre']));
    $mensaje = $conn->real_escape_string(trim($_POST['mensajeEntrada']));


    /* */
    if (!empty($nombre) && !empty($mensaje)) {
        $sql = "INSERT INTO consulta_contacto (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
        if ($conn->query($sql) === TRUE) {
            header("Location: http://localhost/proyecto/archivos/subpaginas/consultas/consulta.html");
            exit;
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Por favor completa todos los campos.";
    }
}
?>
<?php
session_start(); 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servidor = "localhost";
$usuario = "root"; 
$contrasena = "";
$basedatos = "formulario_contacto";

$conn = new mysqli($servidor, $usuario, $contrasena, $basedatos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que los campos no estén vacíos
    if (isset($_POST['nombre']) && isset($_POST['contrasena']) && 
        !empty($_POST['nombre']) && !empty($_POST['contrasena'])) {
        
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];

        $stmt = $conn->prepare("SELECT * FROM usuarios_contacto WHERE nombre = ? AND contrasena = ?");
        $stmt->bind_param("ss", $nombre, $contrasena);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $_SESSION['loggedin'] = true; 
            header("Location: http://localhost/proyecto/archivos/subpaginas/bienvenido/bienvenido.html");
            exit;
        } else {
            header("Location: http://localhost/proyecto/archivos/subpaginas/contacto/procesar.php?error=1");
            exit;
        }

        $stmt->close();
    } else {
        header("Location: http://localhost/proyecto/archivos/subpaginas/contacto/procesar.php?error=2");
        exit;
    }
}

$conn->close();
?>

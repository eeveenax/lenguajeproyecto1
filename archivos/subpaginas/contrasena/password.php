<?php
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && !empty($_POST['email'])) {
    $email = $conn->real_escape_string(trim($_POST['email'])); 

    $sql = "SELECT * FROM usuarios_contacto WHERE email = ?";  // Se busca solo en el campo 'email'
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);  
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div>";
            echo "<strong>Contraseña:</strong> " . htmlspecialchars($row['contrasena']) . "<br />";
        }
    } else {
        echo "<div class='mensaje_error'>No se encontraron resultados para ese email.</div>";
    }

    $stmt->close();
} else {
    header("Location: http://localhost/proyecto/archivos/Practica_2.html");
    exit(); 
}

// Cerrar la conexión
$conn->close();
?>

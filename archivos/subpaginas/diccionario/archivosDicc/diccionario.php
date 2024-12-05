<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Encabezado para contenido de respuesta
header("Content-Type: text/html; charset=UTF-8");

// Datos de conexión a la base de datos
$servidor = "localhost";
$usuario = "root"; 
$contrasena = ""; 
$basedatos = "formulario_contacto";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Validar solicitud POST y dato recibido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombreBuscar'])) {
    $nombre = $conn->real_escape_string(trim($_POST['nombreBuscar']));
    
    // Preparar consulta SQL
    $sql = "SELECT * FROM usuarios_dicc WHERE nombre LIKE ?";
    $stmt = $conn->prepare($sql);
    
    if ($stmt) {
        $searchTerm = "%" . $nombre . "%";
        $stmt->bind_param("s", $searchTerm);

        if ($stmt->execute()) {
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<div>";
                    echo "<strong>Nombre:</strong> " . htmlspecialchars($row['nombre']) . "<br />";
                    echo "<strong>Mensaje:</strong> " . htmlspecialchars($row['mensaje']) . "<br />";
                    echo "</div><hr />";
                }
            } else {
                echo "No se encontraron resultados.";
            }
        } else {
            echo "Error al ejecutar la consulta: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
} else {
    echo "No se recibió ningún dato válido.";
}

$conn->close();
?>

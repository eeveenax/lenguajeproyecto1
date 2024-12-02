<?php
// Habilitar la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root"; 
$contrasena = "";
$basedatos = "formulario_contacto";

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena, $basedatos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Comprobar si se recibió el nombre para buscar
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombreBuscar'])) {
    $nombre = $conn->real_escape_string(trim($_POST['nombreBuscar'])); 

    $sql = "SELECT * FROM consulta_contacto WHERE nombre LIKE ?"; 
    $stmt = $conn->prepare($sql);
    $searchTerm = "%" . $nombre . "%";
    $stmt->bind_param("s", $searchTerm);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si hay resultados y mostrarlos
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

    $stmt->close();
}

// Cerrar la conexión
$conn->close();
?>

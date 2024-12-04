<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

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

    $nombre = $conn->real_escape_string(trim($_POST['nombre']));
    $mensaje = $conn->real_escape_string(trim($_POST['mensajeEntrada']));

    if (!empty($nombre) && !empty($mensaje)) {
        $sql = "INSERT INTO usuarios_dicc (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
        if ($conn->query($sql) === TRUE) {
            // Enviar mensaje de éxito y mantener la misma página
            echo "<script>
                    alert('Mensaje enviado correctamente.');
                    // Opcional: si necesitas limpiar el formulario después de enviar:
                    document.getElementById('formulario').reset();
                  </script>";
        } else {
            // Si ocurre un error al insertar
            echo "<script>alert('Error al enviar el mensaje. Intenta nuevamente.');</script>";
        }
    } else {
        // Si los campos están vacíos
        echo "<script>alert('Por favor completa todos los campos.');</script>";
    }
}
?>

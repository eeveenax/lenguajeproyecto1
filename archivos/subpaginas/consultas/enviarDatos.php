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
        $sql = "INSERT INTO consulta_contacto (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
        if ($conn->query($sql) === TRUE) {
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Por favor completa todos los campos.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consultas</title>
    <link rel="shortcut icon" href="img/pregunta.png" />
    <link rel="stylesheet" href="consulta.css" />
</head>
<body>
    <div>
        <img src="img/menu.png" alt="menu icono" width="20" height="20" class="menu" id="menu" />
        <nav id="navegador" style="display: none">
            <a href="http://localhost/proyecto/archivos/Practica_2.html?loggedin=true">Inicio</a>
        </nav>
    </div>

    <h1>Foro de consultas</h1>
    <p>
        En este apartado puedes escribir todas las dudas o consultas que tengas...
        <span>¡No te quedes con ellas!</span>
    </p>
    <br />

    <form id="formulario" class="formulario" action="" method="POST">
        <div class="forodudas">
            <input type="text" name="nombre" id="usuarioNombre" placeholder="Escribe un nombre..." required />
            <br />
            <textarea name="mensajeEntrada" id="mensajeEntrada" placeholder="Escribe un mensaje aquí" required></textarea>
        </div>
        <div class="boton">
            <input type="submit" value="Enviar" class="miboton" id="miboton" />
        </div>
    </form>
    <br />

    <div class="buscar" id="buscar">
        <br />
        <input type="text" id="texto1" class="texto1" placeholder="¿De quién buscas la respuesta?" name="nombreBuscar" />
        <button type="button" id="botonBuscar">Buscar</button>
    </div>
    <br />
    <div class="textoinfo" id="textoinfo"></div>

    <script src="consulta.js"></script>
</body>
</html>

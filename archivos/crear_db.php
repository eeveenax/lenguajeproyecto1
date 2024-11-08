<?php
// Conexión a MySQL (WAMP)
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; // Si tienes una contraseña configurada en MySQL, colócala aquí

// Crear conexión
$conn = new mysqli($servidor, $usuario, $contrasena);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Crear base de datos
$sql = "CREATE DATABASE IF NOT EXISTS formulario_contacto";
if ($conn->query($sql) === TRUE) {
    echo "Base de datos creada exitosamente o ya existente.<br>";
} else {
    echo "Error creando la base de datos: " . $conn->error;
}

// Seleccionar la base de datos recién creada
if (!$conn->select_db('formulario_contacto')) {
    die("Error seleccionando la base de datos: " . $conn->error);
} else {
    echo "Base de datos seleccionada.<br>";
}

// Eliminar tabla si existe (opcional)
$sql = "DROP TABLE IF EXISTS consulta_contacto";
$conn->query($sql);

// Crear tabla usuarios_contacto
$sql = "CREATE TABLE IF NOT EXISTS usuarios_contacto (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    nacionalidad VARCHAR(50) NOT NULL,
    genero VARCHAR(20) NOT NULL,
    modulo VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    num_telf VARCHAR(15) NOT NULL,
    mensaje TEXT NOT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla usuarios_contacto creada exitosamente.<br>";
} else {
    echo "Error creando la tabla usuarios_contacto: " . $conn->error;
}

// Crear tabla consulta_contacto
$sql = "CREATE TABLE IF NOT EXISTS consulta_contacto (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    mensaje TEXT NOT NULL,
    respuesta TEXT DEFAULT NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Tabla consulta_contacto creada exitosamente.<br>";
} else {
    echo "Error creando la tabla consulta_contacto: " . $conn->error; // Muestra el error
}


// Cerrar la conexión
$conn->close();
?>

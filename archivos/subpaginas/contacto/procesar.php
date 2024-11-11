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

// Comprobar si se recibieron los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si los campos están vacíos o no definidos
    $nombre = isset($_POST['nombre']) ? $conn->real_escape_string($_POST['nombre']) : null;
    $contrasena = isset($_POST['contrasena']) ? $conn->real_escape_string($_POST['contrasena']) : null;
    $nacionalidad = isset($_POST['nacionalidad']) ? $conn->real_escape_string($_POST['nacionalidad']) : null;
    $genero = isset($_POST['genero']) ? $conn->real_escape_string($_POST['genero']) : null;
    $modulo = isset($_POST['modulo']) ? $conn->real_escape_string($_POST['modulo']) : null;
    $email = isset($_POST['email']) ? $conn->real_escape_string($_POST['email']) : null;
    $num_telf = isset($_POST['num_telf']) ? $conn->real_escape_string($_POST['num_telf']) : null;
    $mensaje = isset($_POST['textoArea']) ? $conn->real_escape_string($_POST['textoArea']) : null;

    // Comprobamos si los datos están correctamente recibidos y si no están vacíos
    if (empty($nombre) || empty($contrasena) || empty($nacionalidad) || empty($genero) || empty($modulo) || empty($email) || empty($num_telf) || empty($mensaje)) {
        echo "<script>alert('Por favor, rellena todos los campos del formulario.');</script>";
    } else {
        // Preparar la consulta SQL
        $sql = "INSERT INTO usuarios_contacto (nombre, contrasena, nacionalidad, genero, modulo, email, num_telf, mensaje) 
                VALUES ('$nombre', '$contrasena', '$nacionalidad', '$genero', '$modulo', '$email', '$num_telf', '$mensaje')";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            // Mensaje de éxito
            echo "<script>alert('¡Datos enviados correctamente!');</script>";
        } else {
            echo "Error al insertar los datos: " . $conn->error;
        }
    }
}

// Cerrar la conexión
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contacto</title>
    <link rel="shortcut icon" href="img/contacto.png" />
    <link rel="stylesheet" href="contacto.css" />
  </head>
  <body>
  
    <a href="http://localhost/proyecto/archivos/Practica_2.html"       
   
    >Volver</a>

    <h1>Formulario</h1>
    <p>
      Te dejo un formulario aquí que puedes completar. En este formulario,
      puedes ponerte en contacto conmigo.
    </p>
    <form
      id="formulario"
      class="formulario"
      action="procesar.php"
      method="POST"
    >
      <label for="nombre">Nombre: </label>
      <input
        type="text"
        name="nombre"
        placeholder="escribe tu nombre"
        id="nombre"
        required
      />

      <br /><br />

      <label for="contrasena">Contraseña: </label>
      <input
        type="password"
        name="contrasena"
        placeholder="escribe tu contraseña"
        id="contrasena"
        required
        autocomplete="current-password"
      />

      <br /><br />

      <label for="nacionalidad">Nacionalidad: </label>
      <select name="nacionalidad" required>
        <option value="">Selecciona</option>
        <option value="Europa">Europa</option>
        <option value="Asia">Asia</option>
        <option value="África">África</option>
        <option value="Oceanía">Oceanía</option>
        <option value="América del norte">América del norte</option>
        <option value="América del sur">América del sur</option>
      </select>
      <br /><br />

      <div class="genero">
        <label for="genero">Género: </label>
        <input type="radio" name="genero" value="F" />F
        <input type="radio" name="genero" value="M" />M
        <input type="radio" name="genero" value="Otro" />Otro
      </div>
      <br /><br />

      <div id="radios">
        <label for="modulo">Módulo:</label>
        <input type="radio" id="radio1" name="modulo" value="DAM" />DAM
        <input type="radio" id="radio2" name="modulo" value="DAW" />DAW
        <input type="radio" id="radio3" name="modulo" value="Otro" />Otros
      </div>
      <br />

      <label>Correo electrónico: </label>
      <input
        type="email"
        name="email"
        placeholder="correo@example.com"
        required
        autocomplete="email"
      />

      <br /><br />

      <label>Número de teléfono: </label>
      <input
        type="text"
        name="num_telf"
        placeholder="escribe tu teléfono"
        required
      />
      <br /><br />

      <textarea
        name="textoArea"
        cols="45"
        rows="10"
        placeholder="Escribe un mensaje..."
        required
      ></textarea>
      <br /><br />

      <div class="contenedorBoton">
        <input type="submit" id="miboton" class="miboton" value="enviar" />
    
      </div>
    </form>
    <br />
    <footer>
      <div class="bocadillo">
        ¡Hola!
        <a href="mailto:eveliagilparedes@hotmail.com">
          <img class="fotoEmail" src="img/correo.png" width="20" height="20" />
        </a>
      </div>
      <img
        class="fotoYo"
        src="img/eveiso-animacion (1).gif"
        width="150"
        height="150"
      />
      <a href="https://eveliagilparedes.wixsite.com/eveliagil"
        ><img
          class="fotoyoquieta"
          src="img/yo.png"
          style="display: none"
          width="150"
          height="150"
        />
      </a>
      <br />
      <div id="eve">Evelia Gil Paredes</div>
    </footer>

    <canvas id="confettiCanvas"></canvas>

    <script src="contacto.js"></script>
  </body>
</html>

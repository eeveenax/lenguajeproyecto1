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
        $sql = "INSERT INTO usuarios_dicc (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
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
    <title>Traductor Automático</title>
    <link rel="shortcut icon" href="img/traducir.icon.png" />
    <link rel="stylesheet" href="tasinefectos.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link
      href="https://fonts.googleapis.com/css?family=Rubik:400,600"
      rel="stylesheet"
    />
    <link
      href="http://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
  </head>

  <body>
    <header>
      <div class="contenedor">
        <div class="sombra">Traductores Automáticos</div>
        <div class="tAutomatico">Traductores Automáticos</div>
      </div>
    </header>

    <main>
      <div>
        <img
          src="../img/menu.png"
          alt="menu icono"
          width="20"
          height="20"
          class="menu"
          id="menu"
        />
        <nav id="navegador">
          <a
            href="http://localhost/proyecto/archivos/Practica_2.html?loggedin=true"
            >Inicio</a
          >
          <br />
          <a
            href="http://localhost\proyecto\archivos\subpaginas\subtitulacion\subtitulado.html"
            >Subtitulación</a
          >
          <br />
          <a
            href="http://localhost/proyecto/archivos/subpaginas/doblaje/doblaje.html"
            >Doblaje</a
          >
          <br />

          <a href="http://localhost/proyecto/archivos/subpaginas/ta/ta.html"
            >T.Accesible</a
          >
          <br />
          <a
            href="http://localhost/proyecto/archivos/subpaginas/consultas/consulta.html"
            >Consultas</a
          >
          <br />
          <a
            href="http://localhost/proyecto/archivos/subpaginas/documentos/documentos.html"
            >Documentos</a
          >
        </nav>
      </div>

      <p>
        La traducción automática es una nueva forma de traducción que consiste
        usar la inteligencia artificial con el objetivo de traducir de manera
        automática un texto de una lengua a otra, todo proceso sin intervención
        humana. Es cierto que, aunque los resultados no son nefastos, como hace
        tiempo, todavía queda mucho por mejorar. Es ahí donde interviene el
        entrenamiento de la IA basadas en redes neuronales. El uso de los
        traductores automáticos permiten realizar la tarea de trasvase de
        información de una lengua a otra con menor esfuerzo, pero mayor
        eficacia. A continuación, dejo un enlace a un tradcutor automático muy
        conocido por todos <b><i>Google Translator</i></b>
      </p>
      <br />

      <div id="traductores">
        <br />
        <a
          href="https://www.google.com/search?q=google+traductor&rlz=1C1GCEA_enES1022ES1022&oq=google+tra&gs_lcrp=EgZjaHJvbWUqBggAEEUYOzIGCAAQRRg7Mg0IARAAGIMBGLEDGIAEMgYIAhBFGDkyDQgDEAAYgwEYsQMYgAQyDQgEEAAYgwEYsQMYgAQyBggFEEUYPDIGCAYQRRg8MgYIBxBFGDzSAQgyMDQxajBqN6gCALACAA&sourceid=chrome&ie=UTF-8"
          target="_blank"
          ><img src="../img/traducir.png" width="60" height="60" id="google"
        /></a>

        <br />
        <div id="googleH">
          El Traductor de Google (del inglés Google Translate) es un sistema
          multilingüe de traducción automática, desarrollado y proporcionado por
          Google, para traducir texto, voz, imágenes o video en tiempo real de
          un idioma a otro. Ofrece interfaz web, así como interfaces móviles
          para iOS y Android, y una API, que los desarrolladores pueden utilizar
          para construir extensiones de navegador, aplicaciones, y otros
          softwares. El Traductor de Google posee la capacidad de traducir en
          243 idiomas en distintos niveles, el sistema provee un servicio
          gratuito y diariamente es utilizado por más de 200 millones de
          personas. Desde diciembre de 2016, la traducción de textos gratuita ha
          sido limitada por Google a 5000 caracteres, mientras que la traducción
          de páginas web no posee límite de extensión.
        </div>

        <a href="https://www.deepl.com/es/translator" target="_blank"
          ><img src="../img/deepl.sinfondo.png" width="150" height="80" id="deepl"
        /></a>

        <div id="deeplH">
          DeepL Translator es un servicio de traducción automática neural
          lanzado en agosto de 2017 y propiedad de DeepL SE, con sede en
          Colonia, Alemania. El sistema de traducción se desarrolló primero
          dentro de Linguee y se lanzó como entidad DeepL. Inicialmente ofrecía
          traducciones entre siete idiomas europeos y se fue ampliando hasta
          soportar 26 idiomas con 650 pares de idiomas. Inicialmente el
          traductor de DeepL se podía utilizar de forma gratuita con un límite
          de 5.000 caracteres por traducción. Desde julio de 2023 el volumen que
          se puede traducir de forma gratuita ha descendido a 1.500
          caracteres.También se pueden traducir archivos de Microsoft Word y
          PowerPoint en formatos de archivo Office Open XML (.docx y .pptx) y
          archivos PDF.
        </div>

        <a href="https://es.pons.com/traducci%C3%B3n" target="_blank"
          ><img src="../img/pons.sinfondo.png" width="150" height="80" id="pons"
        /></a>
        <div id="ponsH">
          Desde el primer diccionario impreso hasta la traducción en línea;
          desde el oeste de Stuttgart hasta China, Brasil e India; de los
          primeros materiales para el aprendizaje de lenguas hasta los 2,2
          millones de ejemplares vendidos de la serie “Auf einen Blick” (“De un
          vistazo”): PONS ha alcanzado mucho a lo largo de los años. Todo eso
          define quienes somos. Solo mencionar el PONS Bildwörterbuch
          (Diccionario visual PONS) de la serie revolucionaria de productos
          visuales que, junto a nuestros socios de licencia internacionales, se
          tradujo a 43 idiomas diferentes, entre los que se cuentan idiomas tan
          exóticos como el jemer, el maldivo, el butanés y muchos otros. PONS es
          una de las editoriales dedicadas a los idiomas líderes en Alemania.
          Desde 1978 desarrollamos al más alto nivel los diccionarios
          típicamente verdes y material para el aprendizaje de idiomas para
          aquellas personas que quieren aprender y hacer uso de lenguas
          extranjeras. El nombre PONS, que significa puente en latín, simboliza
          lo que hacemos desde hace décadas: ¡Unir a las personas gracias al
          lenguaje! Ayudamos a nuestras usuarias y a nuestros usuarios a tender
          puentes hacia otros países y otras culturas con gran éxito gracias a
          nuestros productos digitales e impresos.
        </div>
      </div>

      <div class="con1">
        <div>
          <div id="container">
            <div class="select-lang">
              <span><select id="lang1"></select></span>
              <span> <i class="fa fa-exchange"></i> </span>
              <span><select id="lang2"></select></span>
            </div>

            <div class="translater-text">
              <textarea id="user" placeholder="Escribe aquí..."></textarea>
              <button id="clear"><i class="fa fa-trash"></i> Borrar</button>
              <button id="translate">Traducir</button>
            </div>
          </div>

          <div class="output">
            <textarea id="output" placeholder="" readonly></textarea>
            <span> </span>
          </div>
        </div>
      </div>

      <div class="dicc">
        <form
          id="formulario"
          class="formulario"
          action="../tautomatica/traAutoArchivos/enviar.php"
          method="POST"
        >
          <div class="elementosdic">
            <input
              type="text"
              name="nombre"
              id="usuarioNombre"
              placeholder="Escribe un nombre..."
              required
            />
            <br />
            <textarea
              name="mensajeEntrada"
              id="mensajeEntrada"
              placeholder="Lengua fuente. Término fuente || Lengua Salida. Término salida"
              required
            ></textarea>
          </div>
          <div class="boton">
            <input type="submit" value="Enviar" class="miboton" id="miboton" />
          </div>
          <div class="divdic">
            <a
              href="http://localhost\proyecto\archivos\subpaginas\diccionario\diccionario.html"
              target="_blank"
              >Diccionario</a
            >
          </div>
        </form>
      </div>
      <br />
      <div>
        <img
          src="../img/imagen.rodando.png"
          width="90"
          height="90"
          class="trueda"
        />

        <img src="../img/corazon.png" width="50" height="50" id="corazon" />
        <div id="mensaje">
          LOS TRADUCTORES AUTOMÁTICOS NO SON ENEMIGOS, SON AMIGOS
        </div>
      </div>
      <br />
    </main>

    <footer></footer>
  </body>

  <script src="tautomatica.js"></script>
</html>

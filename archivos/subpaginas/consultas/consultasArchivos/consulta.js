/* */

const menu = document.getElementById("menu");
const navegador = document.getElementById("navegador");
const miboton = document.getElementById("miboton");
const botonBuscar = document.getElementById("botonBuscar");

menu.addEventListener("click", function () {
  navegador.classList.toggle("mostrar");
});

/* */
miboton.addEventListener("click", function () {
  // Validar el formulario
  const nombre = document.getElementById("usuarioNombre").value.trim();
  const mensaje = document.getElementById("mensajeEntrada").value.trim();

  if (!nombre || !mensaje) {
    alert("Por favor, completa todos los campos del formulario.");
    return;
  }
  /* */
  alert("Enviado correctamente");

  // Usar setTimeout para permitir al navegador procesar otros eventos
  setTimeout(() => {
    document.getElementById("formulario").reset();
  }, 0);
});

/* */
botonBuscar.addEventListener("click", async function () {
  const nombreBuscar = document.querySelector("#texto1").value;
  if (!nombreBuscar) {
    alert("Por favor, ingresa un nombre para buscar.");
    return;
  }

  /* */
  try {
    const response = await fetch("busqueda.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "nombreBuscar=" + encodeURIComponent(nombreBuscar),
    });

    if (!response.ok) {
      throw new Error("Error en la respuesta del servidor.");
    }

    /* */
    const data = await response.text();
    document.getElementById("textoinfo").innerHTML = data;
  } catch (error) {
    console.error("Error:", error);
    document.getElementById("textoinfo").innerHTML = "Error al buscar datos.";
  }
});

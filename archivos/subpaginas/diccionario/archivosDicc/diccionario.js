const botonBuscar = document.getElementById("botonBuscar");

botonBuscar.addEventListener("click", async function () {
  const nombreBuscar = document.querySelector("#texto1").value;

  if (!nombreBuscar) {
    alert("Por favor, ingresa un nombre para buscar.");
    return;
  }

  try {
    const response = await fetch("archivosDicc/diccionario.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: "nombreBuscar=" + encodeURIComponent(nombreBuscar),
    });

    if (!response.ok) {
      throw new Error("Error en la respuesta del servidor.");
    }

    const data = await response.text();
    document.getElementById("textoinfo").innerHTML = data;
  } catch (error) {
    console.error("Error:", error);
    document.getElementById("textoinfo").innerHTML = "Error al buscar datos.";
  }
});

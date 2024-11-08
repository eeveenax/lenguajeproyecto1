document.addEventListener("DOMContentLoaded", function () {
  const oldPage = document.querySelector(".old-page");
  const elementos = document.querySelector(".elementos");

  setTimeout(() => {
    oldPage.style.display = "none";
    elementos.style.display = "flex";
  }, 3000);

  const botonBuscar = document.getElementById("botonBuscar");

  botonBuscar.addEventListener("click", async function () {
    const emailBuscar = document.querySelector("#email").value;

    if (!emailBuscar) {
      alert("Por favor, ingresa un correo para buscar la contraseña.");
      return;
    }

    try {
      console.log("Buscando correo:", emailBuscar); // Imprimir el correo en la consola para verificar

      const response = await fetch("password.php", {
        method: "POST",
        headers: {
          "Content-Type": "application/x-www-form-urlencoded",
        },
        body: "email=" + encodeURIComponent(emailBuscar),
      });

      console.log("Respuesta del servidor:", response); // Verificar respuesta del servidor

      if (!response.ok) {
        throw new Error("Error en la respuesta del servidor.");
      }

      const data = await response.text();
      console.log("Datos recibidos:", data); // Imprimir los datos recibidos

      document.getElementById("textoContrasena").innerHTML = data;
    } catch (error) {
      console.error("Error:", error);

      document.getElementById("textoContrasena").innerHTML =
        "Error al buscar datos.";
    }
  });
});

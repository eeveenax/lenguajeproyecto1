var boton1 = document.getElementById("boton1");
var formulario = document.getElementById("formulario");

var menu = document.getElementById("menu");
var navegador = document.getElementById("navegador");

var fecha = document.querySelector(".fecha");
var tiempo = document.querySelector(".tiempo");

var proceso1 = document.getElementById("proceso1");
var proceso2 = document.getElementById("proceso2");
var proceso3 = document.getElementById("proceso3");
var imagen1 = document.getElementById("imagenp1");
var imagen2 = document.getElementById("imagenp2");
var imagen3 = document.getElementById("imagenp3");

var titulo1 = document.getElementById("proceso1titulo");
var titulo2 = document.getElementById("proceso2titulo");
var titulo3 = document.getElementById("proceso3titulo");

menu.addEventListener("click", function () {
  if (navegador.style.display == "block") {
    navegador.style.display = "none";
  } else {
    navegador.style.display = "block";
  }
});

// Función para manejar el botón "Más tarde"
document.getElementById("boton1").onclick = function () {
  alert("Has elegido continuar más tarde.");
};

boton1.addEventListener("click", function () {
  if (formulario.style.display === "block" || formulario.style.display === "") {
    formulario.style.display = "none";
  }
});
function relojDigital() {
  var f = new Date();
  annio = f.getFullYear();
  mes = f.getMonth() + 1;
  dia = f.getDate();
  diaSemana = f.getDay();

  let semana = [
    "Domingo",
    "Lunes",
    "Martes",
    "Miercoles",
    "Jueves",
    "Viernes",
    "Sabado",
  ];
  let mostrarSemana = semana[diaSemana];
  fecha.innerHTML = `${dia} / ${mes} / ${annio} ${mostrarSemana}`;

  var tiempoLocal = f.toLocaleTimeString("ES-es");
  tiempo.innerHTML = tiempoLocal;
}

setInterval(() => {
  relojDigital();
}, 1000);

function visibiliad(imagen, proceso) {
  imagen.addEventListener("click", function () {
    if (proceso.style.display === "none") {
      proceso.style.display = "block"; // Mostrar el elemento proceso1
      imagen.style.display = "none"; // Ocultar imagen1
    }

    proceso.addEventListener("click", function () {
      if (imagen.style.display === "none") {
        proceso.style.display = "none"; // Mostrar el elemento proceso1
        imagen.style.display = "block"; // Ocultar imagen1
      }
    });
  });
}

visibiliad(imagen1, proceso1);
visibiliad(imagen2, proceso2);
visibiliad(imagen3, proceso3);

var boton1 = document.getElementById("boton1");
var formulario = document.getElementById("formulario");

var menu = document.getElementById("menu");
var navegador = document.getElementById("navegador");

var fecha = document.querySelector(".fecha");
var tiempo = document.querySelector(".tiempo");

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

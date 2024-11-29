/*Definimos todas las variables que vamos a necesitar*/

var boton1 = document.getElementById("boton1");
var formulario = document.getElementById("formulario");

var menu = document.getElementById("menu");
var navegador = document.getElementById("navegador");

var fecha = document.querySelector(".fecha");
var tiempo = document.querySelector(".tiempo");

/*Para que el menú aparezca*/
menu.addEventListener("click", function () {
  if (navegador.style.display == "none") {
    navegador.style.display = "block";
  } else {
    navegador.style.display = "none";
  }
});

// Función para manejar el botón "Más tarde"
document.getElementById("boton1").onclick = function () {
  alert("Has elegido continuar más tarde.");
};

// Función para ocultar el formulario con el botón "Más tarde"
boton1.addEventListener("click", function () {
  if (formulario.style.display === "block" || formulario.style.display === "") {
    formulario.style.display = "none";
  }
});

// Función reloj
function relojDigital() {
  var f = new Date();
  annio = f.getFullYear();
  // Como enero sería 0, para que sume 1 y no sea 0
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

// Para que muestre los segundos correctamente, es decir, que espere hasta 1 segundo y no aparezcan las milésimas
setInterval(() => {
  relojDigital();
}, 1000);

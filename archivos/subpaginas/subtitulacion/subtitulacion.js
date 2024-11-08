const menu = document.getElementById("menu");
const navegador = document.getElementById("navegador");
const disney = document.getElementById("disney");
const info = document.getElementById("info");

var proceso1 = document.getElementById("paso1");
var proceso2 = document.getElementById("paso2");
var proceso3 = document.getElementById("paso3");
var proceso4 = document.getElementById("paso4");
var proceso5 = document.getElementById("paso5");
var proceso6 = document.getElementById("paso6");

var imagen1 = document.getElementById("imagent1");
var imagen2 = document.getElementById("imagent2");
var imagen3 = document.getElementById("imagent3");
var imagen4 = document.getElementById("imagent4");
var imagen5 = document.getElementById("imagent5");
var imagen6 = document.getElementById("imagent6");

menu.addEventListener("click", function () {
  navegador.classList.toggle("mostrar");
});

disney.addEventListener("click", function () {
  disney.classList.toggle("volteado");
  info.classList.toggle("mostrar");
});

function visibilidad(imagen, paso) {
  imagen.addEventListener("click", function () {
    if (paso.style.display === "none") {
      paso.style.display = "block";
      imagen.style.display = "none";
    }
  });

  paso.addEventListener("click", function () {
    if (imagen.style.display === "none") {
      imagen.style.display = "block";
      paso.style.display = "none";
    }
  });
}

// Aplica la función a todas las imágenes y pasos
visibilidad(imagen1, proceso1);
visibilidad(imagen2, proceso2);
visibilidad(imagen3, proceso3);
visibilidad(imagen4, proceso4);
visibilidad(imagen5, proceso5);
visibilidad(imagen5, proceso5);
visibilidad(imagen6, proceso6);

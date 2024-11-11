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

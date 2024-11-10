const menu = document.getElementById("menu");
const navegador = document.getElementById("navegador");
const disney = document.getElementById("disney");
const info = document.getElementById("info");

menu.addEventListener("click", function () {
  navegador.classList.toggle("mostrar");
});

disney.addEventListener("click", function () {
  disney.classList.toggle("volteado");
  info.classList.toggle("mostrar");
});

const menu = document.getElementById("menu");
const navegador = document.getElementById("navegador");

menu.addEventListener("click", function () {
  navegador.classList.toggle("mostrar");
});

document.addEventListener("DOMContentLoaded", function () {
  var sticky = !!getComputedStyle(document.querySelector("main"))
    .webkitOverflowScrolling;
  if (sticky) {
    document.body.className = "sticky";
  }
});

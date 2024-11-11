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

$(document).ready(function () {
  // Aplica VanillaTilt en todos los elementos con la clase '.card'
  $(".card").each(function () {
    VanillaTilt.init(this, {
      maxTilt: 15,
      perspective: 1400,
      easing: "cubic-bezier(.03,.98,.52,.99)",
      speed: 1200,
      glare: true,
      maxGlare: 0.2,
      scale: 1.04,
    });
  });
});

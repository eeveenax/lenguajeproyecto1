/* */

const menu = document.getElementById("menu");
const navegador = document.getElementById("navegador");
const googleh = document.getElementById("googleH");
const deeplh = document.getElementById("deeplH");
const ponsh = document.getElementById("ponsH");
var foto1 = document.getElementById("google");
var foto2 = document.getElementById("deepl");
var foto3 = document.getElementById("pons");
const mensaje = document.getElementById("mensaje");
var foto = document.querySelector(".trueda");

/* */
menu.addEventListener("click", function () {
  navegador.classList.toggle("mostrar");
});

/* */
foto.addEventListener("animationend", function () {
  foto.addEventListener("click", function () {
    if (mensaje.style.display === "none" || mensaje.style.display === "") {
      mensaje.style.display = "block";
    } else {
      mensaje.style.display = "none";
      foto.style.display = "block";
    }
  });
});

/* */
function mostrarDiv(fotos, div) {
  fotos.addEventListener("animationend", function () {
    if (div.style.display === "none" || div.style.display === "") {
      div.style.display = "block";
    }
  });
}

/* */
mostrarDiv(foto1, googleh);
mostrarDiv(foto2, deeplh);
mostrarDiv(foto3, ponsh);

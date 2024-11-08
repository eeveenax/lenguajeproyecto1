var menu = document.getElementById("menu");
var navegador = document.getElementById("navegador");

menu.addEventListener("click", function () {
  navegador.classList.toggle("mostrar");
});

var selectHombres = document.querySelector(".seleccionarH");
var selectMujeres = document.querySelector(".seleccionarM");

var doblador1 = document.getElementById("doblador1");
var doblador2 = document.getElementById("doblador2");
var doblador3 = document.getElementById("doblador3");
var doblador4 = document.getElementById("doblador4");

var dobladora1 = document.getElementById("dobladora1");
var dobladora2 = document.getElementById("dobladora2");
var dobladora3 = document.getElementById("dobladora3");
var dobladora4 = document.getElementById("dobladora4");

selectHombres.addEventListener("change", function () {
  var selectedValue = selectHombres.value;

  if (selectedValue === "Opción 1") {
    doblador1.style.display = "block";
    doblador2.style.display = "none";
    doblador3.style.display = "none";
    doblador4.style.display = "none";
  } else if (selectedValue === "Opción 2") {
    doblador2.style.display = "block";
    doblador1.style.display = "none";
    doblador3.style.display = "none";
    doblador4.style.display = "none";
  } else if (selectedValue === "Opción 3") {
    doblador3.style.display = "block";
    doblador2.style.display = "none";
    doblador1.style.display = "none";
    doblador4.style.display = "none";
  } else if (selectedValue === "Opción 4") {
    doblador4.style.display = "block";
    doblador2.style.display = "none";
    doblador3.style.display = "none";
    doblador1.style.display = "none";
  }
});

selectMujeres.addEventListener("change", function () {
  var selectedValue = selectMujeres.value;

  if (selectedValue === "Opción 1") {
    dobladora1.style.display = "block";
    dobladora2.style.display = "none";
    dobladora3.style.display = "none";
    dobladora4.style.display = "none";
  } else if (selectedValue === "Opción 2") {
    dobladora2.style.display = "block";
    dobladora1.style.display = "none";
    dobladora3.style.display = "none";
    dobladora4.style.display = "none";
  } else if (selectedValue === "Opción 3") {
    dobladora3.style.display = "block";
    dobladora1.style.display = "none";
    dobladora2.style.display = "none";
    dobladora4.style.display = "none";
  } else if (selectedValue === "Opción 4") {
    dobladora4.style.display = "block";
    dobladora2.style.display = "none";
    dobladora3.style.display = "none";
    dobladora1.style.display = "none";
  }
});

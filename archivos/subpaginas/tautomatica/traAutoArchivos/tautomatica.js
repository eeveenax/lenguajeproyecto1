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

var con1 = document.querySelector(".con1");

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
mostrarDiv(foto3, con1);

$(function () {
  // Bahasa Yang Didukung ):
  var lang1 = [
    "auto",
    "hi",
    "en",
    "it",
    "fr",
    "de",
    "zh-cn",
    "ko",
    "es",
    "id",
    "pt",
    "ru",
    "ja",
    "pl",
  ];
  var lang1txt = [
    "Auto Detect",
    "Hindi",
    "English",
    "Italy",
    "French",
    "Germany",
    "Chinese",
    "Korean",
    "Espana",
    "Bahasa Indonesia",
    "Portugal",
    "Russian",
    "Japanese",
    "polish",
  ];
  var lang2 = [
    "en",
    "hi",
    "it",
    "fr",
    "de",
    "zh-cn",
    "ko",
    "es",
    "id",
    "pt",
    "ru",
    "ja",
    "pl",
  ];
  var lang2txt = [
    "English",
    "Hindi",
    "Italy",
    "France",
    "Germany",
    "Chinese",
    "Korea",
    "Espana",
    "Bahasa Indonesia",
    "Portugal",
    "Russian",
    "Japanese",
    "polish",
  ];

  // element utama
  var elm = {
    lang1: $("#lang1"),
    lang2: $("#lang2"),
    user: $("#lang1"),
    output: $("#lang2"),
    userInput: $("#user"),
    langOutput: $("#output"),
  };

  // Importing Options
  for (let i in lang1) {
    elm.lang1.append(
      "<option value='" + lang1[i] + "'>" + lang1txt[i] + "</option>"
    );
  }
  for (let i in lang2) {
    elm.lang2.append(
      "<option value='" + lang2[i] + "'>" + lang2txt[i] + "</option>"
    );
  }

  // API penerjemah
  function translate() {
    // memformat text ke URL
    var format = elm.userInput.val().replace(/ /g, "%20");

    // Menghubungi JSON
    $.getJSON(
      "https://translate.googleapis.com/translate_a/single?client=gtx&sl=" +
        elm.user.val() +
        "&tl=" +
        elm.output.val() +
        "&dt=t&dt=t&q=" +
        format,
      function (JSON) {
        var convert = JSON.toString();
        var temp = convert.split(",");
        elm.langOutput.val(temp[0]);
      }
    );
  }

  // Makanan Element hah):
  $("#translate").on("click", function () {
    translate();
  });
  $("#clear").on("click", function () {
    elm.userInput.val(null);
    elm.langOutput.val(null);
  });
  setInterval(function () {
    $("#from").text($("#lang1").val());
    $("#to").text($("#lang2").val());
  }, 10);
});

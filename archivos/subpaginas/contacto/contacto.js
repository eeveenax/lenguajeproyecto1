// Confetti animation
const canvas = document.getElementById("confettiCanvas");
const ctx = canvas.getContext("2d");
const colors = [
  "#FF3F8E",
  "#04C2C9",
  "#2E55C1",
  "#F9D423",
  "#00ff00",
  "#ff00ff",
];

/* */
let particles = [];
let mousePos = { x: 0, y: 0 };
let isExploding = false;

/* */
class Particle {
  constructor(x, y) {
    this.x = x;
    this.y = y;
    this.size = Math.random() * 5 + 2;
    this.color = colors[Math.floor(Math.random() * colors.length)];
    this.speedX = (Math.random() - 0.5) * 8;
    this.speedY = (Math.random() - 0.5) * 8;
    this.life = 100;
  }

  /* */
  update() {
    this.x += this.speedX;
    this.y += this.speedY;
    this.life -= 1;
  }

  /* */
  draw() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
    ctx.fillStyle = this.color;
    ctx.fill();
  }
}

/* */
function resizeCanvas() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}

/* */
function createExplosion(x, y) {
  for (let i = 0; i < 50; i++) {
    particles.push(new Particle(x, y));
  }
}

/* */
function animate() {
  ctx.clearRect(0, 0, canvas.width, canvas.height);

  particles = particles.filter((particle) => {
    particle.update();
    particle.draw();
    return particle.life > 0;
  });

  if (isExploding) {
    createExplosion(mousePos.x, mousePos.y);
    isExploding = false; // Reset after explosion
  }

  requestAnimationFrame(animate);
}

/* */
function handleMouseMove(event) {
  mousePos.x = event.clientX;
  mousePos.y = event.clientY;
}

// Initialize
resizeCanvas();
animate();

// Event listeners
window.addEventListener("resize", resizeCanvas);
canvas.addEventListener("mousemove", handleMouseMove);

var miboton = document.getElementById("miboton");

miboton.addEventListener("click", function (event) {
  event.preventDefault(); // Evita el envío inmediato del formulario

  // Validación de los campos del formulario
  var nombre = document.getElementById("nombre").value;
  var contrasena = document.getElementById("contrasena").value;
  var nacionalidad = document.querySelector(
    "select[name='nacionalidad']"
  ).value;
  var genero = document.querySelector("input[name='genero']:checked");
  var modulo = document.querySelector("input[name='modulo']:checked");
  var email = document.querySelector("input[name='email']").value;
  var num_telf = document.querySelector("input[name='num_telf']").value;
  var mensaje = document.querySelector("textarea[name='textoArea']").value;

  // Verificar si algún campo requerido está vacío
  if (
    !nombre ||
    !contrasena ||
    !nacionalidad ||
    !genero ||
    !modulo ||
    !email ||
    !num_telf ||
    !mensaje
  ) {
    // Mostrar el mensaje de error si algún campo está vacío
    alert("Por favor, rellena todos los campos del formulario.");
  } else {
    // Mostrar los confetis si todos los campos están llenos
    const rect = document.getElementById("formulario").getBoundingClientRect();
    mousePos.x = rect.left + rect.width / 2;
    mousePos.y = rect.top + rect.height;

    isExploding = true; // Iniciar la animación de confeti

    // Luego de un retraso (por ejemplo, 2 segundos), enviar el formulario
    setTimeout(function () {
      const formulario = document.getElementById("formulario");
      formulario.submit(); // Enviar el formulario
    }, 2000); // Esperar 2 segundos para que los confetis se muestren
  }
});

const fotoyo = document.querySelector(".fotoYo");
const fotoyoquieta = document.querySelector(".fotoyoquieta");

fotoyo.addEventListener("animationend", function () {
  fotoyo.style.display = "none";
  fotoyoquieta.style.display = "block";
});

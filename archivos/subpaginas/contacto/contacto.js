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

let particles = [];
let mousePos = { x: 0, y: 0 };
let isExploding = false;

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

  update() {
    this.x += this.speedX;
    this.y += this.speedY;
    this.life -= 1;
  }

  draw() {
    ctx.beginPath();
    ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
    ctx.fillStyle = this.color;
    ctx.fill();
  }
}

function resizeCanvas() {
  canvas.width = window.innerWidth;
  canvas.height = window.innerHeight;
}

function createExplosion(x, y) {
  for (let i = 0; i < 50; i++) {
    particles.push(new Particle(x, y));
  }
}

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
var sonidoAudio = document.getElementById("sonidoEnviar");

miboton.addEventListener("click", function (event) {
  event.preventDefault(); // Evita el envío inmediato del formulario

  const rect = document.getElementById("formulario").getBoundingClientRect();
  mousePos.x = rect.left + rect.width / 2;
  mousePos.y = rect.top + rect.height;
  isExploding = true;

  // Reproducir el sonido
  sonidoAudio
    .play()
    .then(() => {
      // Esperar a que el sonido termine de reproducirse antes de enviar el formulario
      sonidoAudio.onended = function () {
        document.getElementById("formulario").submit(); // Envía el formulario después de que el sonido termine
      };
    })
    .catch((error) => {
      console.error("Error al reproducir el sonido:", error);
      document.getElementById("formulario").submit(); // Si hubo un error, envía el formulario de inmediato
    });
});

const fotoyo = document.querySelector(".fotoYo");
const fotoyoquieta = document.querySelector(".fotoyoquieta");

fotoyo.addEventListener("animationend", function () {
  fotoyo.style.display = "none";
  fotoyoquieta.style.display = "block";
  document.getElementById("navegador").style.display = "block";
});

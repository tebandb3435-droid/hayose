// Obtener el canvas y el contexto
const canvas = document.getElementById("matrix");
const ctx = canvas.getContext("2d");

// Hacer que el canvas ocupe toda la pantalla
canvas.height = window.innerHeight;
canvas.width = window.innerWidth;

// Caracteres a usar en la lluvia
const letters = "アァイィウヴエェオカガキギクグケゲコゴサザシジスズセゼソゾタダチヂッツヅテデトドナニヌネノハバパヒビピフブプヘベペホボポ0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
const lettersArr = letters.split("");

// Tamaño de la fuente
const fontSize = 16;
const columns = canvas.width / fontSize;

// Array para almacenar la posición Y de cada columna
const drops = [];

// Inicializar cada columna en la parte superior
for (let x = 0; x < columns; x++) {
  drops[x] = 1;
}

// Función de dibujo
function draw() {
  // Fondo semitransparente para dar efecto de "rastro"
  ctx.fillStyle = "rgba(0, 0, 0, 0.05)";
  ctx.fillRect(0, 0, canvas.width, canvas.height);

  // Color del texto
  ctx.fillStyle = "#0F0"; // Verde Matrix
  ctx.font = fontSize + "px monospace";

  // Dibujar caracteres
  for (let i = 0; i < drops.length; i++) {
    const text = lettersArr[Math.floor(Math.random() * lettersArr.length)];
    ctx.fillText(text, i * fontSize, drops[i] * fontSize);

    // Reiniciar columna si baja demasiado
    if (drops[i] * fontSize > canvas.height && Math.random() > 0.975) {
      drops[i] = 0;
    }

    // Mover la "gota" hacia abajo
    drops[i]++;
  }
}

// Ejecutar animación
setInterval(draw, 33);

// Ajustar tamaño al redimensionar ventana
window.addEventListener("resize", () => {
  canvas.height = window.innerHeight;
  canvas.width = window.innerWidth;
});
const canvas = document.getElementById("matrix");

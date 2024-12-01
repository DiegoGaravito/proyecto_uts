// Selección de elementos
const materias = document.querySelectorAll('.materias ul li select');
const graficoProgreso = document.getElementById('graficoProgreso');
const cursadasSpan = document.getElementById('cursadas');
const pendientesSpan = document.getElementById('pendientes');

// Función para calcular progreso
function calcularProgreso() {
  let totalMaterias = materias.length;
  let cursadas = 0;

  materias.forEach((materia) => {
    if (materia.value === 'cursada') {
      cursadas++;
    }
  });

  let progreso = ((cursadas / totalMaterias) * 100).toFixed(2);
  graficoProgreso.style.background = `linear-gradient(to right, #108b2b ${progreso}%, #f4f4f4 ${100 - progreso}%)`;

  cursadasSpan.textContent = cursadas;
  pendientesSpan.textContent = totalMaterias - cursadas;
}

// Agregar eventos a cada select
materias.forEach((materia) => {
  materia.addEventListener('change', calcularProgreso);
});

// Calcular progreso inicial
calcularProgreso();


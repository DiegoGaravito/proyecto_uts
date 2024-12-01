function checkAuthentication() {
    // Aquí verifica si el usuario está autenticado
    const isAuthenticated = sessionStorage.getItem('authenticated');

    if (!isAuthenticated) {
        window.location.href = 'login.html'; // Redirige a la página de inicio de sesión
    }
}

document.addEventListener("DOMContentLoaded", () => {
    const progreso = document.getElementById("barra-progreso");
    const detalle = document.getElementById("progreso-detalle");
    
    const porcentaje = 39.8; // Ejemplo: puedes conectar esto con una base de datos
    progreso.style.width = `${porcentaje}%`;
    detalle.textContent = `${porcentaje}% Créditos Completados`;
});


// 1. Funciones exclusiva para /login:
function muestraFechaNav() {
  const fecha = document.getElementById('fecha-actual');
  
  // Si el elemento no existe, salir de la función.
  if (!fecha) return;
  
  // Formato en español (día-mes-año).
  const formato = new Intl.DateTimeFormat('es-ES', { 
    day: '2-digit',  // Día con 2 dígitos.
    month: 'short',  // Mes abreviado.
    year: 'numeric'  // Año completo.
  });
  
  const fechaFormateada = formato.format(new Date())
  .replace(/ /g, '-')  // Reemplaza todos (g) los espacios (/ /) por guiones.
  .replace(/\b\w/g, letra => letra.toUpperCase()); // Mayúscula inicial en mes
  
  fecha.textContent = fechaFormateada;
}


function alternarVisibilidad() {
    const campoPassword = document.getElementById('pass');
    const iconoAlternable = document.querySelector('.material-symbols-outlined');

    if (campoPassword.type === 'password') {
        campoPassword.type = 'text';
        iconoAlternable.textContent = 'visibility';
    } else {
        campoPassword.type = 'password';
        iconoAlternable.textContent = 'visibility_off';
    }
}


function alternarIconoTema() {
    const moonIcon = document.getElementById('moon-icon');
    const sunIcon = document.getElementById('sun-icon');
    const body = document.body;

    const lunaVisible = moonIcon.style.display !== 'none';

    if (lunaVisible) {
        moonIcon.style.display = 'none';
        sunIcon.style.display = 'inline';
        body.classList.add('dark-mode');  // ACTIVAR tema oscuro
    } else {
        moonIcon.style.display = 'inline';
        sunIcon.style.display = 'none';
        body.classList.remove('dark-mode');  // DESACTIVAR tema oscuro
    }
}


// Ejecutar cuando el DOM esté listo.
document.addEventListener('DOMContentLoaded', muestraFechaNav);

document.addEventListener('DOMContentLoaded', () => {
    const themeToggle = document.getElementById('theme-toggle');
    themeToggle.addEventListener('click', alternarIconoTema);
});


// --- Explicación: ---
// DOMContentLoaded es un evento que se dispara y ejecutá código JavaScript justo cuando el DOM está preparado (antes de que la página se muestre al usuario). Evita errores al intentar acceder a elementos HTML que aún no existen.
// Estructura del replace(/expresión-regular/, "reemplazo"). \b: Borde de palabra (Boundary). \w: Word character (letra/número).
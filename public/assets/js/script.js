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

function muestraFechaNav() {
  const fecha = document.getElementById('fecha-actual');
  
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


// Ejecutar cuando el DOM esté listo.
document.addEventListener('DOMContentLoaded', muestraFechaNav);






// --- Explicación: ---
// DOMContentLoaded es un evento que se dispara y ejecutá código JavaScript justo cuando el DOM está preparado (antes de que la página se muestre al usuario). Evita errores al intentar acceder a elementos HTML que aún no existen.
// Estructura del replace(/expresión-regular/, "reemplazo"). \b: Borde de palabra (Boundary). \w: Word character (letra/número).
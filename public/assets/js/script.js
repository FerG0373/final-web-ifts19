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


// Función para mostrar la fecha formateada.
function muestraFechaNav() {
  const fecha = document.getElementById('fecha-actual');
  
  function formateaFecha() {
    const formato = { day: 'numeric', month: 'long', year: 'numeric' };
    return new Date().toLocaleDateString('es-ES', formato);
  }  
  // Actualizar el texto del elemento
  fecha.textContent = formateaFecha();
}


// Ejecutar cuando el DOM esté listo.
document.addEventListener('DOMContentLoaded', muestraFechaNav);



// DOMContentLoaded es un evento que se dispara y ejecutá código JavaScript justo cuando el DOM está preparado (antes de que la página se muestre al usuario). Evita errores al intentar acceder a elementos HTML que aún no existen.
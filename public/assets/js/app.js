// 1. FUNCIONES EXCLUSIVAS PARA EL LOGIN.
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
  .replace(/\b\w/g, letra => letra.toUpperCase()); // Mayúscula inicial en mes.
  
  fecha.textContent = fechaFormateada;
}


function alternaVisibilidadPass() {
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

// 2. FUNCIONES PARA EL CAMBIO DE TEMA.
function alternaIconoTema() {
    const iconoLuna = document.getElementById('moon-icon');
    const iconoSol = document.getElementById('sun-icon');
    const modoOscuro = document.body.classList.contains('dark-mode');   /* Comprueba si el body tiene la clase 'dark-mode'. Retorna true o false. */

    iconoLuna.style.display = modoOscuro ? 'none' : 'inline';   /* Si está en modo oscuro, oculta el ícono de la luna; si no, lo muestra. */
    iconoSol.style.display = modoOscuro ? 'inline' : 'none';
}


function alternaTema() {
    const body = document.body;   /* Obtiene el elemento body del documento. */
    body.classList.toggle('dark-mode');   /* Alterna la clase 'dark-mode' en el body. Si ya está, la quita; si no, la añade. */
    
    // Guardar preferencia en localStorage.
    const modoOscuro = body.classList.contains('dark-mode');
    localStorage.setItem('darkMode', modoOscuro);   /* Clave: 'darkMode', Valor: true/false según el modo oscuro. */
    
    // Actualizar íconos.
    alternaIconoTema();
}


function cargaTemaGuardado() {
    const modoOscuro = localStorage.getItem('darkMode') === 'true';   /* Recupera el valor guardado en localStorage. Si es 'true', se considera que el modo oscuro está activado. LocalStorage siempre guarda valores como strings y por eso se compara con 'true'. */
    if (modoOscuro) {
        document.body.classList.add('dark-mode');
    }
    alternaIconoTema();
}


// EJECUTAR CUANDO EL DOM ESTÁ LISTO.
document.addEventListener('DOMContentLoaded', () => {
    muestraFechaNav();
    cargaTemaGuardado();

    const themeToggle = document.getElementById('theme-toggle');
    themeToggle.addEventListener('click', alternaTema);
})


// --- Explicación: ---
// DOMContentLoaded es un evento que se dispara y ejecutá código JavaScript justo cuando el DOM está preparado (antes de que la página se muestre al usuario). Evita errores al intentar acceder a elementos HTML que aún no existen.
// Estructura del replace(/expresión-regular/, "reemplazo"). \b: Borde de palabra (Boundary). \w: Word character (letra/número).
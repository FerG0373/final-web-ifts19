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

function ocultaMensajeInformacion() {
    let mensajeIds = ['mensaje-exito', 'mensaje-error', 'mensaje-alerta'];

    mensajeIds.forEach(id => {
        let mensaje = document.getElementById(id);
        if (mensaje) {
            setTimeout(() => {
                mensaje.style.transition = "opacity 1s ease-out";
                mensaje.style.opacity = "0";

                setTimeout(() => {
                    mensaje.style.display = "none";
                    mensaje.remove();
                }, 1000); // Duración del fade (debe coincidir con la transición CSS)
            }, 4000); // Esperar 4 segundos antes de iniciar el fade
        }
    });
}

// Llama a la función ocultaMensajeInformacion cuando la página ha cargado completamente.
window.onload = function() {
    ocultaMensajeInformacion(); 
};
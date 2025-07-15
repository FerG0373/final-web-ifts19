function alternarVisibilidad() {
    const campoPassword = document.getElementById('password');
    const iconoAlternable = document.querySelector('.material-symbols-outlined');

    if (campoPassword.type === 'password') {
        campoPassword.type = 'text';
        iconoAlternable.textContent = 'visibility';
    } else {
        campoPassword.type = 'password';
        iconoAlternable.textContent = 'visibility_off';
    }
}
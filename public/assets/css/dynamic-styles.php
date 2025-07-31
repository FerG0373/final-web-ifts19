<?php
header("Content-type: text/css");   // Indica que es CSS
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>


/* ########################################################################
 - - - - - - - - - - - - - - - - FOOTER - - - - - - - - - - - - - - - - - -
######################################################################## */

.footer-content {
    background: <?php echo isset($_SESSION['logueado']) ? 'linear-gradient(135deg, var(--color-primario), var(--color-secundario))' : 'var(--color-principal-login)'; ?>;
    color: var(--color-secundario-login);
    padding: 1.5rem 2rem;
    font-family: var(--fuente-principal-login);
    box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
    align-items: center;
    max-width: 100%;
}


.footer-text {
    margin: 0;
    font-size: 0.95rem;
    color: var(--color-secundario-login);
}

<!-- El echo me permite inyectarle el valor directamente en el css. -->
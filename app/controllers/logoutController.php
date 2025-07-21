<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Destruye todas las variables de sesión.
$_SESSION = array();

// Si se usan cookies de sesión, también se debe borrar la cookie de sesión del navegador.
// Esto asegura que la sesión se elimine completamente del lado del cliente.
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalmente, destruir la sesión en el servidor.
session_destroy();

// Redirigir al usuario a la página de login después de cerrar sesión.
header('Location: index.php?page=/login');
exit();
?>
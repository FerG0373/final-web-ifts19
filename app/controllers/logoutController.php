<?php
// 1. Iniciar sesión.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
// 2. Limpiar datos de sesión
$_SESSION = [];

// 3. Destruir la sesión.
session_destroy();

// 4. Borrar la cookie del cliente.
setcookie(session_name(), '', time() - 3600, '/');

// 5. Redirigir.
header('Location: index.php?page=/login');
exit();


// session_name() obtiene el nombre de la cookie de sesión configurada en PHP.
// '' (valor vacío) establece el contenido de la cookie como vacío.
//time() obtiene el timestamp actual (en segundos). - 3600: Resta 1 hora (3600 segundos) para asegurar que la cookie expire inmediatamente.
// '/' establece la ruta raíz (/) del dominio donde la cookie es válida. Sin esto, la cookie solo se borraría para la ruta actual. Con /, se aplica a todo el dominio (incluyendo subdirectorios).
?>
<?php
// Obtiene la página solicitada de la URL, por defecto 'login'.
$vista_solicitada = $_GET['page'] ?? '/login';

switch ($vista_solicitada) {
    case '/login':
        require_once __DIR__ . '/views/1.00-login.php';
        break;
    case '/home':
        require_once __DIR__ . '/views/1.01-home.php';
        break;
    case '/giphy':
        require_once __DIR__ . '/views/2.00-giphy.php';
        break;
    case '/abm_menu':
        require_once __DIR__ . '/views/2.01-landing-page.php';
        break;
    case '/abm_menu':
        require_once __DIR__ . '/views/2.02-abm-menu.php';
        break;
    default:
        require_once __DIR__ . '/views/9.00-notfound.php';
        break;
}
?>
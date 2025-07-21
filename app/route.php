<?php
switch ($vista_solicitada) {
    case '/login':
        // Si la solicitud es POST, significa que el formulario de login fue enviado.
        // En este caso, se incluye el controlador que procesará los datos.
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            require_once __DIR__ . '/controllers/LoginController.php';
        } else {
            // Si la solicitud no es POST, significa que se quiere mostrar el formulario de login.
            require_once __DIR__ . '/views/1.00-login.php';
        }
        break;
    case '/home':
        require_once __DIR__ . '/views/1.01-home.php';
        break;
    case '/giphy':
        require_once __DIR__ . '/views/2.00-giphy.php';
        break;
    case '/landing_page':
        require_once __DIR__ . '/views/2.01-landing-page.php';
        break;
    case '/abm_menu':
        require_once __DIR__ . '/views/2.02-abm-menu.php';
        break;
    default:
        http_response_code(404);
        require_once __DIR__ . '/views/9.00-notfound.php';
        break;
}
?>
<?php
switch ($vista_solicitada) {
    case '/login':
        require_once __DIR__ . '/controllers/loginController.php';
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
    case '/logout':
        require_once __DIR__ . '/controllers/logoutController.php';
        break;
    default:
        http_response_code(404);
        require_once __DIR__ . '/views/9.00-notfound.php';
        break;
}
?>
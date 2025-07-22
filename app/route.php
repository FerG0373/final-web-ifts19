<?php
$rutas = [
    '/login' => __DIR__ . '/controllers/loginController.php',
    '/home' => __DIR__ . '/views/1.01-home.php',
    '/giphy' => __DIR__ . '/views/2.00-giphy.php',
    '/landing_page' => __DIR__ . '/views/2.01-landing-page.php',
    '/abm_menu' => __DIR__ . '/views/2.02-abm-menu.php',
    '/logout' => __DIR__ . '/controllers/logoutController.php'
];

// Verifica si la vista solicitada existe en el array de rutas.
if (!isset($rutas[$vista_solicitada])) {
    http_response_code(404);
    include __DIR__ . '/views/9.00-notfound.php';
    exit();
}

// Carga simple del archivo correspondiente
include $rutas[$vista_solicitada];
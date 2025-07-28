<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$rutas = [
    '/login' => __DIR__ . '/controllers/loginController.php',
    '/home' => __DIR__ . '/views/1.01-home.php',
    '/giphy' => __DIR__ . '/controllers/giphyController.php',
    '/landing_page' => __DIR__ . '/controllers/landingPageController.php',
    '/abm_menu' => __DIR__ . '/controllers/abmMenuController.php',
    '/form_menu' => __DIR__ . '/controllers/abmMenuController.php',
    '/logout' => __DIR__ . '/controllers/logoutController.php'
];  // __DIR__ retorna la ruta absoluta completa del directorio actual (sin el nombre del archivo).

// Rutas que no requieren autenticación.
$rutasPublicas = ['/login'];

// Si no está logueado y la ruta NO es pública, lo redirige al login.
if (!isset($_SESSION['logueado']) && !in_array($vista_solicitada, $rutasPublicas)) {
    header('Location: index.php?page=/login');
    exit;
}

// Verifica si la vista solicitada existe en el array de rutas.
if (!isset($rutas[$vista_solicitada])) {
    http_response_code(404);
    include __DIR__ . '/views/9.00-notfound.php';
    exit();
}

// Carga la vista correspondiente.
include $rutas[$vista_solicitada];
?>
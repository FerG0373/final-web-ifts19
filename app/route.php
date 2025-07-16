<?php

$vista_login = 'login'; 

// No hay lógica de base de datos ni POST de login todavía.
// Solo define qué vista debe cargar index.php.
?>

<?php
// routes.php
$routes = [
    '/' => 'home.php',
    '/login' => 'login.php',
    '/home' => 'home.php'
];

// Obtener la ruta solicitada
$request_uri = strtok($_SERVER['REQUEST_URI'], '?'); // Ignorar parámetros GET

// Verificar si la ruta existe
if (array_key_exists($request_uri, $routes)) {
    require_once $routes[$request_uri];
} else {
    // Página no encontrada
    header("HTTP/1.0 404 Not Found");
    require_once '404.php';
}
?>
<!-- <?php

$vista_login = '../app/views/1.01-login';

// No hay lógica de base de datos ni POST de login todavía.
// Solo define qué vista debe cargar index.php.
?> -->

<?php
$routes = [
    '/' => 'index.php',
    '/home' => '1.00-home.php',
    '/login' => '1.01-login.php',
];

// Obtiene la ruta solicitada
$ruta = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Verifica si existe en el array de rutas
if (array_key_exists($ruta, $routes)) {
    $vista_login = $routes[$ruta];
} else {
    $vista_login = '9.00-notfound.php'; // Vista por defecto si no encuentra la ruta
}
?>
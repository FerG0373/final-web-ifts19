<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 1. Carga configuración de .env
$env = parse_ini_file(__DIR__ . '/../../.env');


// 2. Obtiene la API Key de Giphy desde el .env y la asigna a una variable PHP.
$giphyApiKey = $env['GIPHY_API_KEY'] ?? '';

// 3. Validar que la clave exista.
if (empty($giphyApiKey)) {
    die("Error: API Key no configurada.");
}

// Este controlador ahora pasa la API Key a la vista.
require_once __DIR__ . '/../views/2.00-giphy.php';
?>

<!-- Lo hago desde backend para no exponer la API Key de Giphy en el frontend, aunque sé que está permitido. Es una decisión por seguridad y buenas prácticas. -->
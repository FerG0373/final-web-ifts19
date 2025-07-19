<?php
// Esto es para que 'obtieneMenuTitulos()' esté definida cuando la llamemos dentro de 'route()'.
require_once __DIR__ . '/config/consultasSql.php';

function route(mysqli $conexion): array {
    // Rutas de la aplicación.
    $routes = [
    '/' =>'1.00-home.php',
    '/login' => '1.01-login.php',
    '/not-found' => '9.00-notfound.php',
    '/error' => '9.01-error.php',
    ];    

    // Obtiene la URI actual del servidor.
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $ruta_limpia = $uri === dirname($_SERVER['SCRIPT_NAME']) ? '/' : $uri;

    // Asegura que la ruta nunca quede vacía, sustituyéndola por '/' en ese caso.
    $ruta_limpia = $ruta_limpia === '' ? '/' : $ruta_limpia;

    $vistaActual = $routes[$ruta_limpia] ?? '/9.00-notfound.php';
    if (!array_key_exists($ruta_limpia, $routes)) {
        http_response_code(404);
    }

    return [
        'vista_actual' => $vistaActual,
        'menu_titulos' => obtieneMenuTitulos($conexion)
    ];
}
?>

<!--
parse_url -> Descompone la URL en sus componentes (protocolo, dominio, ruta, etc.).
$_SERVER['REQUEST_URI'] -> Te da la URI completa (ruta + parámetros).
PHP_URL_PATH -> Limpia la URI, extrayendo solo la ruta (sin ?, #, o parámetros).

dirname() -> Retorna el nombre del directorio padre de la ruta especificada.
$_SERVER['SCRIPT_NAME'] -> Contiene la ruta del script actual (ejemplo: /public/index.php).

La función array_key_exists() en PHP se usa para verificar si una clave específica existe dentro de un array.

Operador Null Coalescing (??) -> Asigna el valor de la izquierda si NO es null. Sino, asigna el de la derecha.
-->
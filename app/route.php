<?php
require_once __DIR__ . '/config/consultasSql.php';
$GLOBALS['titulos_header'] = obtieneMenuTitulos();

$routes = [
    '/' =>'1.00-home.php',
    '/login' => '1.01-login.php',
    '/not-found' => '9.00-notfound.php',
    '/error' => '9.01-error.php',
];

$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$script_name = dirname($_SERVER['SCRIPT_NAME']);

if (strpos($request_uri, $script_name) === 0) {
    $ruta_limpia = substr($request_uri, strlen($script_name));
} else {
    // Si la URI no comienza con el nombre del script (ej. estás en la raíz del dominio), usa la URI tal cual
    $ruta_limpia = $request_uri;
}

if ($ruta_limpia === '') {
    $ruta_limpia = '/';
}

if (array_key_exists($ruta_limpia, $routes)) {    
    $GLOBALS['vista_actual'] = $routes[$ruta_limpia];
} else {
    $GLOBALS['vista_actual'] = 'pages/9.00-notfound.php';
    http_response_code(404);
}

// // Verifica si existe en el array de rutas
// if (array_key_exists($ruta, $routes)) {
//     $vista_login = $routes[$ruta];
// } else {
//     $vista_login = '9.00-notfound.php'; // Vista por defecto si no encuentra la ruta
// }
?>
<?php
$env = parse_ini_file(__DIR__ . '/../../.env');  // Carga las variables de entorno desde el archivo .env

$conexion = mysqli_connect(
    $env['DB_HOST'],
    $env['DB_USER'],
    $env['DB_PASS'],
    $env['DB_NAME']
);

//$conexion = mysqli_connect($host, $user, $pass, $db);
mysqli_report(MYSQLI_REPORT_OFF);  // Desactiva los errores de mysqli para manejarlos manualmente porque sino no me muestra los errores de mysqli en el navegador.

if (!$conexion) {
    http_response_code(500);
    die("Error de conexión a la DB: " . mysqli_connect_error());    
} else {
    //echo('✅ Conexión OK');
}

// Establece el conjunto de caracteres a UTF-8 para evitar problemas con tildes y caracteres especiales.
mysqli_set_charset($conexion, "utf8");
?>
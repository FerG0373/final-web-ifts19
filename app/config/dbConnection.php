<!-- Accede a la base de datos mySql(mariadb). -->
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'tp_final_giphy';

$conexion = mysqli_connect($host, $user, $pass, $db);

if (!$conexion) {
    http_response_code(500);
    die("Error de conexión a la DB: " . mysqli_connect_error());    
} else {
    //echo('✅ Conexión OK');
}

// Establece el conjunto de caracteres a UTF-8 para evitar problemas con tildes y caracteres especiales.
mysqli_set_charset($conexion, "utf8");
?>
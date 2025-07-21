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
    echo('✅ Conexión OK'); 
}
?>
<?php
// app/config/database.php
define('DB_HOST', 'localhost'); // O la IP de tu servidor de DB
define('DB_NAME', 'tu_nombre_de_la_base_de_datos'); // ¡Cambia esto!
define('DB_USER', 'tu_usuario_de_la_base_de_datos'); // ¡Cambia esto!
define('DB_PASS', 'tu_password_de_la_base_de_datos'); // ¡Cambia esto!

try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
} catch (PDOException $e) {
    die("Error de conexión a la base de datos: " . $e->getMessage());
}
<?php
// Incluye la configuración de la conexión a la base de datos.
require_once __DIR__ . '/../app/config/dbConnection.php';

function main() {
    // Para iniciar la sesión PHP. Esto debe ir al principio de cualquier script que use sesiones.
    session_start();
    //$conexion_db = obtieneConexionDB();
    $GLOBALS['db_connection'] = obtieneConexionDB();

    // Cargar la lógica de ruteo
    require_once '../app/route.php';
    
    // __DIR__ es una constante de PHP que representa la ruta absoluta del directorio donde está ubicado el archivo actual.
    require_once __DIR__ . '/../app/views/0.00-layout.php';
}

main();
?>
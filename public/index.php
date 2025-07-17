<?php
require_once __DIR__ . '/config/dbConnection.php';

function main() {
    // Para iniciar la sesión PHP.
    session_start();

    $conexion_db = getDbConnection();

    // Cargar la lógica de ruteo
    require_once '../app/route.php';

    // Acá va a ir mi layout, por ahora arrancamos con $vista_login.
    require_once $vista_login . '.php';
}

main();
?>
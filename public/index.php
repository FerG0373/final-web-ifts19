<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Asegura que la variable $conexion esté disponible globalmente para todo el script.
require_once __DIR__ . '/../app/config/dbConnection.php';

// Obtiene la página solicitada de la URL, por defecto 'login'.
$vista_solicitada = $_GET['page'] ?? '/login';

// Si la URL es la raíz, redirigir a /home si está logueado, o a /login si no.
if (empty($_GET['page']) || $_GET['page'] === '/') {
    if (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true) {
        header('Location: index.php?page=/home');
        exit();
    } else {
        header('Location: index.php?page=/login');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFTS 19 - Web</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
    <header>
        <?php
        // Si la vista solicitada es 'login', no incluimos el header.
        if ($vista_solicitada !== '/login') {
            require_once __DIR__ . '/../app/views/_partials/_header.php';
        }
        ?>
    </header>
    <main>
        <?php
        require_once __DIR__ . '/../app/route.php';
        ?>
    </main>
    <footer>
        <?php        
        // Cerrar la conexión al final del script.
        if (isset($conexion) && $conexion) {
            mysqli_close($conexion);
        }
        ?>
    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
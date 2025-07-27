<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Obtiene la página solicitada. Los parámetros de consulta después del ? de la URL.
$vista_solicitada = $_GET['page'] ?? '';

// Si la URL es la raíz, redirigir a /home si está logueado, o a /login si no lo está.
if (empty($vista_solicitada)) {
    if (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true) {
        header('Location: index.php?page=/home');
        exit();
    } else {
        header('Location: index.php?page=/login');
        exit();
    }
}

// Si estoy logueado y quiero ingresar al formulario de login, me redirige a home.
if ($vista_solicitada === '/login' && isset($_SESSION['logueado']) && $_SESSION['logueado'] === true) {
    header('Location: index.php?page=/home');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFTS 19 - Web</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/giphy.css">
</head>
<body>
    <header>
        <?php
        // Si la vista solicitada es 'login', no incluimos el header.
        if ($vista_solicitada !== '/login') {
            require_once __DIR__ . '/../app/views/_partials/_header.php';
        } else {
            require_once __DIR__ . '/../app/views/_partials/_headerLogin.php';
        }
        ?>
    </header>
    <main>
        <?php
        require __DIR__ . '/../app/route.php';
        ?>
    </main>
    <footer>
        
    </footer>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/giphy.js"></script>
</body>
</html>

<?php if (isset($conexion)) mysqli_close($conexion); ?>
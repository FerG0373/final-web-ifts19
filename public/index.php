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

    </header>
    <main>
        <?php
        // Obtiene la página solicitada de la URL, por defecto 'login'.
        $vista_solicitada = $_GET['page'] ?? '/login';

        // Aquí iría la lógica de sesión para verificar si el usuario está logueado.
        // Por ahora, solo para ilustrar la navegación:
        switch ($vista_solicitada) {
        case '/':
            require_once __DIR__ . '/../app/views/1.00-home.php';
            break;
        case '/login':
            require_once __DIR__ . '/../app/views/1.01-login.php';
            break;
        default:
            require_once __DIR__ . '/../app/views/9.00-notfound.php';
            break;
        }
        ?>
    </main>
    <footer>

    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
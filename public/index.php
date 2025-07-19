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
        require_once __DIR__ . '/../app/config/dbConnection.php';

        $vista_solicitada = $_GET['page'] ?? '/login';
        
        if ($vista_solicitada !== '/') {
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

    </footer>

    <script src="assets/js/script.js"></script>
</body>
</html>
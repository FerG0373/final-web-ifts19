<?php
require_once '../app/route.php'; 

// Para iniciar la sesión PHP.
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IFTS 19 - Web</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <?php
    require_once '../app/views/' . $vista_login . '.php';
    ?>

    <script src="assets/js/script.js"></script>
</body>
</html>
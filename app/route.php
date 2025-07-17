<!-- <?php

$vista_login = 'login'; 

// No hay lógica de base de datos ni POST de login todavía.
// Solo define qué vista debe cargar index.php.
?> -->

<?php
$routes = [
    '/' => 'home.php',
    '/login' => 'login.php',
    '/home' => 'home.php'
];
?>
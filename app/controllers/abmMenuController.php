<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/dbConnection.php';
require_once __DIR__ . '/../config/dbQueries.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcionIngresada = trim(htmlspecialchars($_POST['title'] ?? ''));
    $rutaIngresada = trim(htmlspecialchars($_POST['path'] ?? ''));

    if (empty($descripcionIngresada) || empty($rutaIngresada)) {
        $_SESSION['abm_error'] = "⚠️ Todos los campos son obligatorios";
        header('Location: index.php?page=/abm_menu');
        exit();
    
    $resultadoInsertDb = insertaTituloMenu($conexion, $descripcionIngresada, $rutaIngresada);    

    if ($resultadoInsertDb) {
        $_SESSION['success_message'] = "✅ Menú insertado correctamente";
    } else {
        $_SESSION['error_message'] = "❌ Error al insertar el menú: " . mysqli_error($conexion);
    }

    mysqli_close($conexion);
    header('Location: index.php?page=/abm_menu');
    exit();
    }
}

// Mostrar vista del formulario
require_once __DIR__ . '/../views/2.02-abm-menu.php';
?>
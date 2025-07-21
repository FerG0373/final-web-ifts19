<?php
// Se verifica si la sesión ya está iniciada para evitar errores si se llama de nuevo.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Incluir dbQueries.php para tener acceso a la función obtieneUsuario().
require_once __DIR__ . '/../config/dbQueries.php';

// Variable para almacenar mensajes de error.
$mensaje_error = '';

// Este controlador solo se ejecuta cuando se recibe una solicitud POST a la URL de login.
// El router (route.php) se encarga de dirigir la solicitud hasta acá.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario.
    $usuario = $_POST['username'] ?? '';
    $pass = $_POST['pass'] ?? '';

    // Valida que los campos no estén vacíos.
    if (empty($usuario) || empty($pass)) {
        $mensaje_error = 'Por favor, ingresar usuario y contraseña.';
    } else {
        $usuario = obtieneUsuario($conexion, $usuario);
        
        // Verifica si el usuario existe y si la contraseña es correcta.
        if ($usuario && $pass === $usuario['pass']) {
            // Almacenar información del usuario en la sesión.
            $_SESSION['id_usuario'] = $usuario['id'];
            $_SESSION['username'] = $usuario['nombre'];
            $_SESSION['logueado'] = true; // Bandera para indicar que el usuario está logueado.

            // Redirigir al usuario a la página de inicio (home).
            header('Location: index.php?page=/home');
            exit();
        } else {
            $mensaje_error = 'Nombre de usuario o contraseña incorrectos.';
        }
    }
}

// Si hay un error, lo guardamos en la sesión para mostrarlo en la vista de login.
if ($mensaje_error) {
    $_SESSION['login_error'] = $mensaje_error;
}

// Redirigir al usuario a la página de login si no se ha logueado correctamente.
header('Location: index.php?page=/login');
exit();
?>
<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Se verifica si la sesión ya está iniciada para evitar errores si se llama de nuevo.
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Si el usuario ya está logueado, redirige al home.
if (isset($_SESSION['logueado']) && $_SESSION['logueado'] === true) {
    header('Location: index.php?page=/home'); // Redirige a la URL de home
    exit();
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
            echo '<div>Nombre de usuario o contraseña incorrectos</div>';
            $mensaje_error = 'Nombre de usuario o contraseña incorrectos.';
        }
    }
}

// Si hay un error, lo guardamos en la sesión para mostrarlo en la vista de login.
if ($mensaje_error) {
    $_SESSION['login_error'] = $mensaje_error;
}

// Redirigir al usuario a la página de login si no se ha logueado correctamente.
// header('Location: index.php?page=/login');
// exit();
require_once __DIR__ . '/../views/1.00-login.php';
?>
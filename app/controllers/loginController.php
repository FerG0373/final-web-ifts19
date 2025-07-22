<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

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

// Procesar POST (formulario enviado).
// El router (route.php) se encarga de dirigir la solicitud hasta acá.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtiene los datos del formulario.
    $usuarioIngresado = $_POST['username'] ?? '';
    $passIngresado = $_POST['pass'] ?? '';

    // Validación.
    if (empty($usuarioIngresado) || empty($passIngresado)) {
        $_SESSION['login_error'] = 'Por favor, ingresar usuario y contraseña.';
    } else {
        // Busca usuario en DB.
        $usuarioDB = obtieneUsuario($conexion, $usuarioIngresado);

        // Verifica si el usuario existe y si la contraseña es correcta.
        if ($usuarioIngresado && $passIngresado === $usuarioDB['pass']) {
            // Almacenar información del usuario en la sesión.
            $_SESSION['id_usuario'] = $usuarioDB['id'];
            $_SESSION['username'] = $usuarioDB['nombre'];
            $_SESSION['logueado'] = true; // Bandera para indicar que el usuario está logueado.

            // Redirigir al usuario a la página de inicio (home).
            header('Location: index.php?page=/home');
            exit();
        } else {
            $_SESSION['login_error'] = 'Credenciales incorrectas';
        }
    }
    // Recargar el login si falló
    header('Location: index.php?page=/login');
    exit();
}

// Mostrar formulario (solo si NO es POST y no está logueado).
require_once __DIR__ . '/../views/1.00-login.php';
?>
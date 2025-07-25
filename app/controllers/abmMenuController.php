<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/dbConnection.php';
require_once __DIR__ . '/../config/dbQueries.php';

$tituloEditar = null;

function precargaFormulario($conexion): ?array {
    // Verificar si la acción es 'edit' y si se proporciona un ID
    if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
        $idTitulo = filter_var($_GET['id'], FILTER_VALIDATE_INT); // Validar que el ID sea un entero

        if ($idTitulo) {
            // Llamar a la función de dbQueries para obtener los datos del título.
            $tituloSeleccionado = obtieneTituloMenuPorId($conexion, $idTitulo);

            if (!$tituloSeleccionado) {
                // Si el título no se encuentra, establecer un mensaje de error
                $_SESSION['mensaje_alerta'] = "⚠️ Título no encontrado para editar.";
                // Redirigir a la lista (abm_menu)
                header('Location: index.php?page=/abm_menu');
                exit();
            }
            return $tituloSeleccionado; // Retornar los datos del título.
        } else {
            // Si el ID es inválido, establecer un mensaje de error
            $_SESSION['mensaje_alerta'] = "⚠️ ID de menú inválido para editar.";
            // Redirigir a la lista principal (abm_menu)
            header('Location: index.php?page=/abm_menu');
            exit();
        }
    }
    return null; // Si no es modo edición o no hay ID, retornar null
}

function altaDeTitulo(mysqli $conexion, array $datosPost): void {
    $descripcionIngresada = trim(htmlspecialchars($_POST['title'] ?? ''));
    $rutaIngresada = trim(htmlspecialchars($_POST['path'] ?? ''));

    if (empty($descripcionIngresada) || empty($rutaIngresada)) {
        $_SESSION['mensaje_alerta'] = "⚠️ Los campos son obligatorios";
        header('Location: index.php?page=/abm_menu');
        exit();
    }

    $resultadoInsertDb = insertaTituloMenu($conexion, $descripcionIngresada, $rutaIngresada);

    if ($resultadoInsertDb) {
        $_SESSION['mensaje_exito'] = "✅ Menú insertado correctamente";
    } else {
        $_SESSION['mensaje_error'] = "❌ Error al insertar el menú: " . mysqli_error($conexion);
    }

    header('Location: index.php?page=/abm_menu');
    exit();
}


// --- Lógica principal del controlador ---

// Manejar solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!$conexion) {
        $_SESSION['mensaje_error'] = "❌ Error de conexión a la base de datos. Por favor, verifique la configuración.";
        header('Location: index.php?page=/abm_menu'); // Redirige a la lista si hay error de conexión
        exit();
    }

    altaDeTitulo($conexion, $_POST);
}


// Manejar solicitudes GET.
$vistaSolicitada = $_GET['page'] ?? '';

if ($vistaSolicitada === '/form_menu') {
    $tituloEditar = precargaFormulario($conexion);
    require_once __DIR__ . '/../views/2.03-form-menu.php';
} else {
    // Mostrar vista del formulario.
    require_once __DIR__ . '/../views/2.02-abm-menu.php';
}
?>


<!-- $conexion SIEMPRE se define en el código, en dbQueries.php (incluso si falla, se le asigna false).

mysqli_connect() devuelve: un objeto mysqli si la conexión es exitosa, y false si falla.

Por lo tanto, !isset($conexion) nunca será true, haciendo redundante la primera parte de la condición. -->
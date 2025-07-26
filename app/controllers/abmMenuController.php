<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/dbConnection.php';
require_once __DIR__ . '/../config/dbQueries.php';

$tituloEditar = null;  // Variable para almacenar los datos del título si estamos en modo edición.

function precargaFormulario(mysqli $conexion): ?array {
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
            $_SESSION['mensaje_alerta'] = "⚠️ ID de título inválido para editar.";
            // Redirigir a la lista principal (abm_menu)
            header('Location: index.php?page=/abm_menu');
            exit();
        }
    }
    return null; // Si no es modo edición o no hay ID, retornar null
}

function altaTitulo(mysqli $conexion, array $datosPost): void {
    $descripcionIngresada = trim(htmlspecialchars($datosPost['title'] ?? ''));
    $rutaIngresada = trim(htmlspecialchars($datosPost['path'] ?? ''));

    if (empty($descripcionIngresada) || empty($rutaIngresada)) {
        $_SESSION['mensaje_alerta'] = "⚠️ Los campos son obligatorios";
        header('Location: index.php?page=/abm_menu');
        exit();
    }

    $resultadoInsertDb = insertaTituloMenu($conexion, $descripcionIngresada, $rutaIngresada);

    if ($resultadoInsertDb) {
        $_SESSION['mensaje_exito'] = "✅ Elemento insertado correctamente";
    } else {
        $_SESSION['mensaje_error'] = "❌ Error al insertar el elemento";
    }

    header('Location: index.php?page=/abm_menu');
    exit();
}

function modificaTitulo(mysqli $conexion, array $datosPost): void {
    $idModificar = (int)$datosPost['id'];
    $descripcionIngresada = trim(htmlspecialchars($datosPost['title'] ?? ''));
    $rutaIngresada = trim(htmlspecialchars($datosPost['path'] ?? ''));

    if (empty($descripcionIngresada) || empty($rutaIngresada)) {
        $_SESSION['mensaje_alerta'] = "⚠️ Todos los campos son obligatorios para modificar.";
        header('Location: index.php?page=/form_menu&action=edit&id=' . $idModificar);
        exit();
    }

    // Ejecutamos la actualización
    $resultadoUpdateDb = modificaTituloMenu($conexion, $idModificar, $descripcionIngresada, $rutaIngresada);
    if ($resultadoUpdateDb) {
        $_SESSION['mensaje_exito'] = "✅ Elemento actualizado correctamente";
    } else {
        $_SESSION['mensaje_error'] = "❌ Error al actualizar el elemento";
    }

    header('Location: index.php?page=/abm_menu');
    exit();
}

function bajaTitulo(mysqli $conexion, array $datosPost): void {
    $idEliminar = filter_var($datosPost['id'] ?? null, FILTER_VALIDATE_INT); // Obtener y validar el ID

    if (!$idEliminar) {
        $_SESSION['mensaje_alerta'] = "⚠️ ID de elemento inválido para eliminar.";
        header('Location: index.php?page=/abm_menu');
        exit();
    }

    $resultadoDeleteDb = eliminaTituloMenu($conexion, $idEliminar); // Llama a la función de dbQueries

    if ($resultadoDeleteDb) {
        $_SESSION['mensaje_exito'] = "✅ Elemento eliminado correctamente.";
    } else {
        $_SESSION['mensaje_error'] = "❌ Error al eliminar el elemento.";
    }

    header('Location: index.php?page=/abm_menu');
    exit();
}

// --- Lógica principal del controlador ---

// Manejar solicitudes POST.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!($conexion instanceof mysqli)) {
        $_SESSION['mensaje_error'] = "❌ Error de conexión a la base de datos.";
        header('Location: index.php?page=/abm_menu'); // Redirige a la lista si hay error de conexión
        exit();
    }

    if (isset($_POST['action']) && $_POST['action'] === 'delete') {
        bajaTitulo($conexion, $_POST);
    } else if (isset($_POST['id'])) {
        modificaTitulo($conexion, $_POST);
    }  else {
        altaTitulo($conexion, $_POST);
    }
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

Por lo tanto, !isset($conexion) nunca será true, haciendo redundante la primera parte de la condición. 

instanceof mysqli asegura que $conexion sea exactamente un objeto mysqli (no false, null, etc.).

filter_var(): Función de PHP para sanitizar (limpiar) y validar datos. Muy importante para la seguridad, ya que ayuda a 
que los datos que se recibe de fuentes externas (como formularios enviados por usuarios) son del tipo y formato esperados,
y no contienen código malicioso o inesperado.
Toma dos argumentos principales: la variable que se quiere filtrar y el tipo de filtro que se quiere aplicar.

FILTER_VALIDATE_INT es una constante que se usa con filter_var(). Valida si una variable es un número entero.
-->
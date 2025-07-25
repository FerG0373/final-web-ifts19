<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../config/dbConnection.php';
require_once __DIR__ . '/../config/dbQueries.php';

$tituloEditar = null;

function precargaFormulario($conexion) {
    // Verificar si la acción es 'edit' y si se proporciona un ID
    if (isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])) {
        $idToEdit = filter_var($_GET['id'], FILTER_VALIDATE_INT); // Validar que el ID sea un entero

        if ($idToEdit) {
            // Llamar a la función de dbQueries para obtener los datos del título
            $tituloSeleccionado = obtieneTituloMenuPorId($conexion, $idToEdit);

            if (!$tituloSeleccionado) {
                // Si el título no se encuentra, establecer un mensaje de error
                $_SESSION['mensaje_error'] = "❌ Menú no encontrado para editar.";
                // Redirigir a la lista principal (abm_menu)
                header('Location: index.php?page=/abm_menu');
                exit();
            }
            return $tituloSeleccionado; // Retornar los datos del título
        } else {
            // Si el ID es inválido, establecer un mensaje de error
            $_SESSION['abm_error'] = "⚠️ ID de menú inválido para editar.";
            // Redirigir a la lista principal (abm_menu)
            header('Location: index.php?page=/abm_menu');
            exit();
        }
    }
    return null; // Si no es modo edición o no hay ID, retornar null
}



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $descripcionIngresada = trim(htmlspecialchars($_POST['title'] ?? ''));
    $rutaIngresada = trim(htmlspecialchars($_POST['path'] ?? ''));

    if (empty($descripcionIngresada) || empty($rutaIngresada)) {
        $_SESSION['abm_error'] = "⚠️ Los campos son obligatorios";
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


$vistaSolicitada = $_GET['page'] ?? '';

if ($vistaSolicitada === '/form_menu') {
    $tituloEditar = precargaFormulario($conexion);
    require_once __DIR__ . '/../views/2.03-form-menu.php';
} else {
    // Mostrar vista del formulario
    //$menuTitulos = obtieneTitulosMenu($conexion);
    require_once __DIR__ . '/../views/2.02-abm-menu.php';
}
?>
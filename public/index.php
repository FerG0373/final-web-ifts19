<?php
// Incluye la configuración de la conexión a la base de datos.
require_once __DIR__ . '/../app/config/dbConnection.php';

// Función auxiliar para cargar el layout con variables.
function cargaLayoutConVariables($layoutRuta, array $variablesRoutes) {
    // La función extract() toma un array asociativo y crea variables con los nombres de las claves y los valores del array.
    extract($variablesRoutes);
    
    // Ahora, $vista_actual y $menu_titulos están disponibles en el ámbito de este include.
    if (file_exists($layoutRuta)) {
        require_once $layoutRuta;
    } else {
        error_log("Error: El archivo de layout no se encontró en: " . $layoutRuta);
        echo "<h1>Error Fatal: El layout principal no pudo ser cargado.</h1>";
    }
}

function main() {
    // Para iniciar la sesión PHP. Esto debe ir al principio de cualquier script que use sesiones.
    session_start();
    $conexion_db = obtieneConexionDB();

    // Cargar el archivo que contiene la función de ruteo.
    require_once '../app/route.php';

    $route_datos = route($conexion_db);
    $vista_actual = $route_datos['vista_actual'];
    $menu_titulos = $route_datos['menu_titulos'];
    
    // __DIR__ es una constante de PHP que representa la ruta absoluta del directorio donde está ubicado el archivo actual.
    require_once __DIR__ . '/../app/views/0.00-layout.php';

    cargaLayoutConVariables($layout_file, [
        'vista_actual' => $vista_actual,
        'menu_items_for_header' => $menu_titulos // La clave aquí debe coincidir con el nombre de la variable en el layout.
    ]);
    
    // Cierra la conexión a la base de datos al finalizar la ejecución de main().
    if ($conexion_db) {
        mysqli_close($conexion_db);
    }
}

main();
?>
<?php

define('SERVER', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DATABASE', 'tp_final_giphy');

function getDbConnection() {
    $conexion = null;
    
    try {
        // Intenta conectar a la base de datos.
        $conexion = mysqli_connect(SERVER, USER, PASS, DATABASE);
        echo('Conexión OK');

        // Verifica si la conexión fue exitosa.
        if (!$conexion) {
            // Si la conexión falla, mysqli_connect_error() va a contener el mensaje.
            // Lanzamos una excepción para que sea capturado en el bloque catch.
            throw new Exception("Error de conexión a la base de datos: " . mysqli_connect_error());
        }
        return $conexion;

    } catch (Exception $ex) {
        // Captura cualquier excepción lanzada en el try.
        error_log("Error en getDbConnection(): " . $ex->getMessage());
        die("Error crítico: No se pudo conectar a la base de datos. Por favor, intente más tarde. [Código: " . $ex->getCode() . "]");
        // return null;
    }
}

// Para probar la conexión (esto no lo dejarías en producción así, solo para verificar)

$db_conexion_procedural = getDbConnection();

if ($db_conexion_procedural) {
    // Si la conexión es exitosa, puedes usar $db_conexion_procedural para tus consultas.
    // Ejemplo de consulta:
    // $resultado = mysqli_query($db_conexion_procedural, "SELECT * FROM tu_tabla LIMIT 1");
    // if ($resultado) {
    //     $fila = mysqli_fetch_assoc($resultado);
    //     print_r($fila);
    // }
    //
    // No olvides cerrar la conexión cuando hayas terminado (al final del script o de tu lógica de DB)
    // mysqli_close($db_conexion_procedural);
} else {
    // La función ya maneja el die(), pero si la modificaras para retornar null,
    // aquí podrías manejar el error.
    echo "La aplicación no pudo establecer conexión con la base de datos.";
}
?>
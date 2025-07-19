<?php
require_once __DIR__ . '/dbConnection.php';

function obtieneMenuTitulos() {
    $conexion = obtieneConexionDB();
    $consultaSql = "SELECT id, descripcion, ruta_destino FROM menu ORDER BY orden ASC";
    $resultado = mysqli_query($conexion, $consultaSql);
    
    $menuTitulos = [];
    
    if (!$resultado) {
        echo "No se pudo obtener la conexión a la base de datos para obtener los menús.";
        return [];
    }

    // mysqli_fetch_assoc solo devuelve índices asociativos: $fila["nombre"].
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $menuTitulos[] = $fila;
    }

    mysqli_close($conexion);
    return $menuTitulos;
}
?>
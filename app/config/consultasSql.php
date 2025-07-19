<?php
function obtieneMenuTitulos($conexion): array {    
    $consultaSql = "SELECT id, descripcion, ruta_destino FROM menu ORDER BY orden ASC";
    $resultado = mysqli_query($conexion, $consultaSql);
    
    $menuTitulos = [];
    
    if (!$resultado) {
        error_log("Error en la consulta de menús: " . mysqli_error($conexion));
        return [];
    }

    // mysqli_fetch_assoc solo devuelve índices asociativos: $fila["nombre"].
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $menuTitulos[] = $fila;
    }

    mysqli_free_result($resultado); //Para liberar memoria.
    
    return $menuTitulos;
}
?>
<?php
function obtieneMenuTitulos($conexion): array {    
    $sentenciaSql = "SELECT id, descripcion, ruta_destino FROM menu ORDER BY orden ASC";
    $resultado = mysqli_query($conexion, $sentenciaSql);
    
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

function obtieneUsuario(mysqli $conexion, string $usuario): ?array {
    // 1. Consulta SQL con un marcador de posición (?) para el valor dinámico.
    $sentenciaSql = "SELECT id, nombre, pass FROM usuario WHERE nombre = ?";

    // 2. Prepara la consulta.
    $stmt = mysqli_prepare($conexion, $sentenciaSql);  // Retorna un objeto del tipo mysqli_stmt.
    
    if ($stmt === false) {
        error_log("Error al obtener el resultado de la consulta: " . mysqli_error($conexion));
        return null;
    }

    // 3. Vincula parámetros. Qué valor dinámico debe usar stmt para el marcador (?) "s" indica que $usuario es un string.
    mysqli_stmt_bind_param($stmt, "s", $usuario);

    // 4. Ejecuta la consulta preparada por mysqli_prepare().
    mysqli_stmt_execute($stmt);
    
    // 5. Obtiene el resultado de la consulta.
    $resultado = mysqli_stmt_get_result($stmt);  // Retorna un objeto del tipo mysqli_result.

    // Verificación de errores al obtener el resultado.
    if ($resultado === false) {
        error_log("Error al obtener el resultado: " . mysqli_error($conexion));
        mysqli_stmt_close($stmt); // Cerrar el statement si hubo error.
        return null;
    }

    // 6. Procesa las filas del resultado. mysqli_fetch_assoc() toma una de esas filas del conjunto de resultados y la convierte en un array asociativo.
    $usuario = mysqli_fetch_assoc($resultado); // Obtiene la primera (y única, si el nombre es único) fila.

    // 7. Libera recursos.
    mysqli_free_result($resultado); // Libera la memoria del conjunto de resultados.
    mysqli_stmt_close($stmt); // Cierra la sentencia preparada.
    
    return $usuario;
}

?>
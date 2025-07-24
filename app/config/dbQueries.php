<?php
function obtieneMenuTitulos($conexion): array {    
    $sentenciaSql = "SELECT id, descripcion, ruta_destino FROM menu ORDER BY orden IS NULL, orden ASC";
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

function obtieneUsuario($conexion, string $usuario): ?array {    
    // 1. Validar entrada de usuario.
    $usuario = trim($usuario);
    if (empty($usuario)) {
        error_log("Error: Nombre de usuario vacío");
        return null;
    }

    // 2. Consulta SQL con un marcador de posición (?) para el valor dinámico.
    $sentenciaSql = "SELECT id, nombre, pass FROM usuario WHERE nombre = ?";

    // 3. Prepara la consulta.
    $stmt = mysqli_prepare($conexion, $sentenciaSql);  // Retorna un objeto del tipo mysqli_stmt.    
    if ($stmt === false) {
        error_log("Error al preparar la consulta: " . mysqli_error($conexion));
        return null;
    }

    // 4. Vincula parámetros. Qué valor dinámico debe usar stmt para el marcador (?) "s" indica que $usuario es un string.
    mysqli_stmt_bind_param($stmt, "s", $usuario);
    if (!$stmt) {
        error_log("Error al vincular parámetros: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);  // Cierra el statement si hubo error.
        return null;
    }

    // 4. Ejecuta la consulta preparada por mysqli_prepare().
    $execute = mysqli_stmt_execute($stmt);
    if (!$execute) {
        error_log("Error al ejecutar consulta: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);
        return null;
    }
    
    // 5. Obtiene el resultado de la consulta.
    $resultado = mysqli_stmt_get_result($stmt);  // Retorna un objeto del tipo mysqli_result.
    if ($resultado === false) {
        error_log("Error al obtener el resultado: " . mysqli_error($conexion));
        mysqli_stmt_close($stmt); 
        return null;
    }

    // 6. Procesa las filas del resultado. mysqli_fetch_assoc() toma una de esas filas del conjunto de resultados y la convierte en un array asociativo.
    $datosUsuario = mysqli_fetch_assoc($resultado); // Obtiene la primera (y única, si el nombre es único) fila.

    // 7. Libera recursos.
    mysqli_free_result($resultado); // Libera la memoria del conjunto de resultados.
    mysqli_stmt_close($stmt); // Cierra la sentencia preparada.
    
    return $datosUsuario;
}

function insertaTituloMenu($conexion, $descripcion, $ruta) {
    $sentenciaSql  = "INSERT INTO menu (descripcion, ruta_destino) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexion, $sentenciaSql);
    
    if ($stmt === false) {
        error_log("Error al preparar la consulta: " . mysqli_error($conexion));
        return false;
    }
    // Si no se puede vincular los parámetros..
    if (!mysqli_stmt_bind_param($stmt, "ss", $descripcion, $ruta)) {
        error_log("Error al bindear parámetros: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);
        return false;
    }

    $resultado = mysqli_stmt_execute($stmt);
    if (!$resultado) {
        error_log("Error al ejecutar la consulta: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);
        return false;
    }
    
    mysqli_stmt_close($stmt);    
    return $resultado;  // True o False.
}
?>
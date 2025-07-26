<?php
// Para el nav del header.
function obtieneTitulosMenu(mysqli $conexion): array {    
    $sql = "SELECT id, descripcion, ruta_destino FROM menu ORDER BY orden IS NULL, orden ASC";
    $resultado = mysqli_query($conexion, $sql);
    
    $titulosMenu = [];
    
    if (!$resultado) {
        error_log("Error en la consulta de menús: " . mysqli_error($conexion));
        return [];
    }

    // mysqli_fetch_assoc solo devuelve índices asociativos: $fila["nombre"].
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $titulosMenu[] = $fila;
    }

    mysqli_free_result($resultado); //Para liberar memoria.
    
    return $titulosMenu;
}
// Para loguear al usuario.
function obtieneUsuarioPorNombre(mysqli $conexion, string $nombreUsuario): ?array {    
    // 1. Validar entrada de usuario.
    $usuario = trim($nombreUsuario);
    if (empty($usuario)) {
        error_log("Error: Nombre de usuario vacío");
        return null;
    }

    // 2. Consulta SQL con un marcador de posición (?) para el valor dinámico.
    $sql = "SELECT id, nombre, pass FROM usuario WHERE nombre = ?";

    // 3. Prepara la consulta.
    $stmt = mysqli_prepare($conexion, $sql);  // Retorna un objeto del tipo mysqli_stmt.    
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

    // 4. Ejecuta la consulta preparada por mysqli_prepare() y retorna true o false.
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
// Para insertar un título en la base de datos.
function insertaTituloMenu(mysqli $conexion, string $descripcion, string $ruta) {
    $sql  = "INSERT INTO menu (descripcion, ruta_destino) VALUES (?, ?)";
    $stmt = mysqli_prepare($conexion, $sql);
    
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
// Para precargar el formulario de edición.
function obtieneTituloMenuPorId(mysqli $conexion, int $id): ?array {
    $sentenciaSql = "SELECT id, descripcion, ruta_destino FROM menu WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sentenciaSql);

    if ($stmt === false) {
        error_log("Error al preparar la consulta: " . mysqli_error($conexion));
        return null;
    }

    mysqli_stmt_bind_param($stmt, "i", $id); // "i" de int.

    // Ejecuta y valida la consulta.
    if (!mysqli_stmt_execute($stmt)) {
        error_log("Error al ejecutar la consulta: " . mysqli_stmt_error($stmt));
        mysqli_stmt_close($stmt);
        return null;
    }
    
    $resultado = mysqli_stmt_get_result($stmt);  // Obtiene el resultado de la consulta. O sea, el objeto mysqli_result si está todo bien, sino retorna false.
    if ($resultado === false) {
        error_log("Error al obtener el resultado: " . mysqli_error($conexion));
        mysqli_stmt_close($stmt);
        return null;
    }

    $tituloMenu = mysqli_fetch_assoc($resultado);
    mysqli_free_result($resultado);
    mysqli_stmt_close($stmt);

    return $tituloMenu;
}

// Para actualizar un título.
function modificaTituloMenu(mysqli $conexion, int $id, string $nuevaDescripcion, string $nuevaRuta): bool {
    $sql = "UPDATE menu SET descripcion = ?, ruta_destino = ? WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt === false) {
        error_log("Error al preparar la consulta: " . mysqli_error($conexion));
        return false;
    }

    mysqli_stmt_bind_param($stmt, "ssi", $nuevaDescripcion, $nuevaRuta, $id); // "ssi" o sea, 2 strings y 1 int.
    $resultadoExito = mysqli_stmt_execute($stmt);

    if (!$resultadoExito) {
        error_log("Error al ejecutar la consulta (updateTituloMenu): " . mysqli_stmt_error($stmt));
    }
    
    mysqli_stmt_close($stmt);
    return $resultadoExito;  // true o false.
}

// Para eliminar un título.
function eliminaTituloMenu(mysqli $conexion, int $id): bool {
    $sql = "DELETE FROM menu WHERE id = ?";
    $stmt = mysqli_prepare($conexion, $sql);

    if ($stmt === false) {
        error_log("Error al preparar la consulta: " . mysqli_error($conexion));
        return false;
    }

    mysqli_stmt_bind_param($stmt, "i", $id);
    $resultadoExito = mysqli_stmt_execute($stmt);

    if (!$resultadoExito) {
        error_log("Error al ejecutar la consulta: " . mysqli_stmt_error($stmt));
    }

    mysqli_stmt_close($stmt);
    return $resultadoExito;
}
?>
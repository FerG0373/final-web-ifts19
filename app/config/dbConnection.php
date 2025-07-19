<!-- Accede a la base de datos mySql(mariadb). -->
<?php
    define('SERVER', 'localhost');
    define('USER', 'root');
    define('PASS', '');
    define('DATABASE', 'tp_final_giphy');

function obtieneConexionDB() {
    $conexion = null;
    
    try {
        // Intenta conectar a la base de datos.
        $conexion = mysqli_connect(SERVER, USER, PASS, DATABASE);  // Retorna un recurso mysqli o false.        

        // Verifica si la conexión fue exitosa.
        if (!$conexion) {
            // Si la conexión falla, mysqli_connect_error() va a contener el mensaje.
            // Lanzamos una excepción manualmente para que sea capturado en el bloque catch, ya que mysqli_connect devuelve false.
            throw new Exception("Error de conexión a la base de datos: " . mysqli_connect_error());
        }

        // echo('✅ Conexión OK');
        // return $conexion;
    
    // Captura cualquier excepción lanzada en el try.
    } catch (Exception $ex) {        
        error_log("Error en getDbConnection(): " . $ex->getMessage());
        header('Location: /9.01-error.php');
        exit();
    }
}
?>
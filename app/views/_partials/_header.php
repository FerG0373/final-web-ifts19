<?php
require_once __DIR__ . '/../../config/dbConnection.php';
require_once __DIR__ . '/../../config/dbQueries.php';

$menuTitulos = obtieneMenuTitulos($conexion);
?>

<nav>
    <ul>
        <?php foreach ($menuTitulos as $titulo): ?>
            <li>
                <a href="index.php?page=<?php echo htmlspecialchars($titulo['ruta_destino']); ?>">
                    <?php echo htmlspecialchars($titulo['descripcion']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

<!-- htmlspecialchars() es una función de PHP que sirve para convertir caracteres especiales en entidades HTML. Es para seguridad.-->
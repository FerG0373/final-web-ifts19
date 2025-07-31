<?php
require_once __DIR__ . '/../../config/dbConnection.php';
require_once __DIR__ . '/../../config/dbQueries.php';

$menuTitulos = obtieneTitulosMenu($conexion);
?>

<nav class="nav">
    <ul class="nav-list">
        <?php foreach ($menuTitulos as $titulo): ?>
            <li class="nav-item">
                <a href="index.php?page=<?php echo htmlspecialchars($titulo['ruta_destino']); ?>" class="nav-link">
                    <?php echo htmlspecialchars($titulo['descripcion']); ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>  

<!-- htmlspecialchars() es una función de PHP que sirve para convertir caracteres especiales en entidades HTML. Es para seguridad.-->
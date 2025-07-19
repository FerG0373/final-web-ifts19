<?php
require_once __DIR__ . '/../../config/consultasSql.php';

$menuTitulos = obtieneMenuTitulos();
?>

<nav>
    <ul>
        <?php foreach ($menuTitulos as $item): ?>
            <li>
                <a href="<?php echo $item['ruta_destino']; ?>">
                    <?php echo $item['descripcion']; ?>
                </a>
            </li>
        <?php endforeach; ?>

        <!-- <?php
        // Opcional: Agregar el enlace de LogOut si la sesión está iniciada
        // Verifica si 'usuario_logueado' existe en $_SESSION
        if (isset($_SESSION['usuario_logueado']) && $_SESSION['usuario_logueado'] !== null) {
            ?>
            <li><a href="/logout">LogOut</a></li>
            <?php
        }
        ?> -->
    </ul>
</nav>

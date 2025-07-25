<?php 
require_once __DIR__ . '/../config/dbConnection.php';
require_once __DIR__ . '/../config/dbQueries.php';

$menuTitulosABM = obtieneTitulosMenu($conexion);
?>

<h1>ABM MENU</h1>

<!-- Mostrar mensajes de éxito/error -->
<?php if (isset($_SESSION['mensaje_exito'])): ?>
    <div style="color: green;"><?= $_SESSION['mensaje_exito'] ?></div>
    <?php unset($_SESSION['mensaje_exito']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['mensaje_error'])): ?>
    <div style="color: red;"><?= $_SESSION['mensaje_error'] ?></div>
    <?php unset($_SESSION['mensaje_error']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['mensaje_alerta'])): ?>
    <div style="color: orange;"><?= $_SESSION['mensaje_alerta'] ?></div>
    <?php unset($_SESSION['mensaje_alerta']); ?>
<?php endif; ?>


 <!-- --- Lista de títulos --- -->
<?php if (empty($menuTitulosABM)): ?>
    <p>No hay títulos de menú registrados.</p>
<?php else: ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Descripción</th>
                <th>Ruta de Destino</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($menuTitulosABM as $titulo): ?>
                <tr>
                    <td><?= htmlspecialchars($titulo['id']) ?></td>
                    <td><?= htmlspecialchars($titulo['descripcion']) ?></td>
                    <td><?= htmlspecialchars($titulo['ruta_destino']) ?></td>
                    <td>
                        <?php if ($titulo['id'] > 5): ?>
                            <a href="index.php?page=/form_menu&action=edit&id=<?= htmlspecialchars($titulo['id']) ?>" title="Editar">✏️</a>
                            <form action="index.php?page=/abm_menu" method="POST" class="delete-form">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?= ($titulo['id']) ?>">
                                <button type="submit" onclick="return confirm('¿Está seguro que desea eliminar este título?');" title="Eliminar">🗑️</button>
                            </form>
                        <?php else: ?>
                            <span></span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>

<div>
    <a href="index.php?page=/form_menu" class="add-button">
        ➕ Agregar Nuevo Título
    </a>
</div>
<h1>ABM MENU</h1>

<?php if (empty($menuTitulos)): ?>
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
            <?php foreach ($menuTitulos as $titulo): ?>
                <tr>
                    <td><?= htmlspecialchars($titulo['id']) ?></td>
                    <td><?= htmlspecialchars($titulo['descripcion']) ?></td>
                    <td><?= htmlspecialchars($titulo['ruta_destino']) ?></td>
                    <td>
                        <a href="index.php?page=/form_menu&action=edit&id=<?= htmlspecialchars($titulo['id']) ?>" title="Editar">✏️</a>
                        <form action="index.php?page=/abm_menu" method="POST" class="delete-form">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= ($titulo['id']) ?>">
                            <button type="submit" onclick="return confirm('¿Está seguro que desea eliminar este título?');" title="Eliminar">🗑️</button>
                        </form>
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
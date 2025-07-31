<?php 
require_once __DIR__ . '/../config/dbConnection.php';
require_once __DIR__ . '/../config/dbQueries.php';

$titulosMenuABM = obtieneTitulosMenu($conexion);
?>

<div class="abm-container">    
    <h2 class="abm-title">ABM MENU</h2>
    
    <!-- MENSAJES DE ÉXITO/ERROR -->
    <?php if (isset($_SESSION['mensaje_exito'])): ?>
        <div id="mensaje-exito" class="abm-message success"><?= $_SESSION['mensaje_exito'] ?></div>
        <?php unset($_SESSION['mensaje_exito']); ?>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['mensaje_error'])): ?>
        <div id="mensaje-error" class="abm-message error"><?= $_SESSION['mensaje_error'] ?></div>
        <?php unset($_SESSION['mensaje_error']); ?>
    <?php endif; ?>
    
    <?php if (isset($_SESSION['mensaje_alerta'])): ?>
        <div id="mensaje-alerta" class="abm-message alert"><?= $_SESSION['mensaje_alerta'] ?></div>
        <?php unset($_SESSION['mensaje_alerta']); ?>
    <?php endif; ?>
    
    
     <!-- --- TABLA CON LA LISTA DE TÍTULOS --- -->
    <?php if (empty($titulosMenuABM)): ?>
        <p>No hay títulos de menú registrados.</p>
    <?php else: ?>
        <div class="table-container">            
            <table class="abm-table">
                <thead>
                    <tr>
                        <th width="15%">ID</th>
                        <th width="35%">Descripción</th>
                        <th width="35%">Ruta de Destino</th>
                        <th width="15%">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($titulosMenuABM as $titulo): ?>
                        <tr>
                            <td><?= htmlspecialchars($titulo['id']) ?></td>
                            <td><?= htmlspecialchars($titulo['descripcion']) ?></td>
                            <td><?= htmlspecialchars($titulo['ruta_destino']) ?></td>
                            <td class="acciones">
                                <?php if ($titulo['id'] > 5): ?>
                                    <div class="acciones-container">
                                        <a href="index.php?page=/form_menu&action=edit&id=<?= htmlspecialchars($titulo['id']) ?>" title="Editar">✏️</a>
                                        <form action="index.php?page=/abm_menu" method="POST">
                                            <input type="hidden" name="action" value="delete">
                                            <input type="hidden" name="id" value="<?= ($titulo['id']) ?>">
                                            <button type="submit" onclick="return confirm('¿Está seguro que desea eliminar este título?');" title="Eliminar">🗑️</button>
                                        </form>
                                    </div>
                                <?php else: ?>
                                    <span></span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>
    
    <div>
        <a href="index.php?page=/form_menu">
            ➕ Agregar Nuevo Título
        </a>
    </div>
</div>
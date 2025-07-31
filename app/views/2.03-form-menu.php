<div class="form-container">
    <h2 class="form-title"><?= isset($tituloEditar) ? 'Editar Título' : 'Agregar Título' ?></h2>
    
    <form action="index.php?page=/abm_menu" method="POST" class="abm-form">
        <?php if (isset($tituloEditar)): ?>
            <input type="hidden" name="id" value="<?= htmlspecialchars($tituloEditar['id']) ?>">
        <?php endif; ?>

        <div class="form-group">
            <label for="title" class="form-label">Descripción:</label>
            <input type="text" id="title" name="title" placeholder="Ingresar nombre del título" class="form-input" value="<?= htmlspecialchars($tituloEditar['descripcion'] ?? '') ?>" required >
        </div>

        <div class="form-group">
            <label for="path" class="form-label">Ruta de destino:</label>
            <input type="text" id="path" name="path" placeholder="Ingresar ruta de destino" class="form-input" value="<?= htmlspecialchars($tituloEditar['ruta_destino'] ?? '') ?>" required >
        </div>
            
        <div class="btn-acciones">
            <button type="submit" name="submit_form" class="btn-accion btn-insertar">
                <?= isset($tituloEditar) ? 'Actualizar Título' : 'Insertar Título' ?>
            </button>
            <a href="index.php?page=/abm_menu" class="btn-accion btn-cancelar">Cancelar</a>
        </div>
    </form>
</div>

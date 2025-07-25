<h1><?= isset($tituloEditar) ? 'Editar Título' : 'Agregar Título' ?></h1>

<form action="index.php?page=/abm_menu" method="POST">
    <?php if (isset($tituloEditar)): ?>
        <input type="hidden" name="id" value="<?= htmlspecialchars($tituloEditar['id']) ?>">
    <?php endif; ?>
    <div>
        <label for="title">Descripción:</label>
        <input type="text" id="title" name="title" placeholder="Ingresar nombre del título" value="<?= htmlspecialchars($tituloEditar['descripcion'] ?? '') ?>" required >
    </div>
    <div>
        <label for="path">Ruta de destino:</label>
        <input type="text" id="path" name="path" placeholder="Ingresar ruta de destino" value="<?= htmlspecialchars($tituloEditar['ruta_destino'] ?? '') ?>" required >
    </div>

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

    <button type="submit" name="submit_form">
        <?= isset($tituloEditar) ? 'Actualizar Título' : 'Insertar Título' ?>
    </button>
    <a href="index.php?page=/abm_menu">Cancelar</a>
</form>
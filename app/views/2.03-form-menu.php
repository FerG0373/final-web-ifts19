<h1>ABM MENU</h1>
<form action="index.php?page=/abm_menu" method="POST">
    <div>
        <label for="title">Descripción:</label>
        <input type="text" id="title" name="title" placeholder="Ingresar nombre del título" required >
    </div>
    <div>
        <label for="path">Ruta de destino:</label>
        <input type="text" id="path" name="path" placeholder="Ingresar ruta de destino" required >
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

    <?php if (isset($_SESSION['abm_error'])): ?>
        <div style="color: orange;"><?= $_SESSION['abm_error'] ?></div>
        <?php unset($_SESSION['abm_error']); ?>
    <?php endif; ?>

    <button type="submit" name="login">Insertar Título</button>
</form>
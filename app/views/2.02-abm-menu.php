<h1>ABM MENU</h1>

<!-- Mostrar mensajes de éxito/error -->
<?php if (isset($_SESSION['success_message'])): ?>
    <div style="color: green;"><?= $_SESSION['success_message'] ?></div>
    <?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])): ?>
    <div style="color: red;"><?= $_SESSION['error_message'] ?></div>
    <?php unset($_SESSION['error_message']); ?>
<?php endif; ?>

<form action="index.php?page=/abm_menu">
    <div>
        <label for="title">Descripción:</label>
        <input type="text" id="title" name="title" placeholder="Ingresar nombre del título" >
    </div>
    <div>
        <label for="path">Ruta de destino:</label>
        <input type="text" id="path" name="path" placeholder="Ingresar ruta de destino" >
    </div>

    <button type="submit" name="login">Insertar Título</button>

</form>
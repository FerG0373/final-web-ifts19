<h2>¡Bienvenido!</h2>

<form action="index.php?page=/login" method="POST"> 
    <div>
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" placeholder="Usuario" required>
    </div>
    <div>
        <label for="pass">Contraseña:</label>
        <input type="password" id="pass" name="pass" placeholder="Contraseña" required>
        <span class="material-symbols-outlined" onclick="alternarVisibilidad()">visibility_off</span>
    </div>
    
    <?php 
        // Muestra mensaje de error según corresponda.
        if (isset($_SESSION['login_error'])): ?>
        <div class="mensaje error">
            <?php echo($_SESSION['login_error']); ?>
        </div>
        <?php unset($_SESSION['login_error']); ?>
    <?php endif; ?>

    <button type="submit" name="login">Iniciar Sesión</button>
</form>
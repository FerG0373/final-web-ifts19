<div class="login-container">
    <form class="login-form" action="index.php?page=/login" method="POST">
        <h2 class="form-title">¡Bienvenido!</h2>        
        <div class="form-group">
            <label class="form-label" for="username">Usuario:</label>
            <input class="form-input" type="text" id="username" name="username" placeholder="Usuario" required>
        </div>        
        <div class="form-group password-container">
            <label class="form-label" for="pass">Contraseña:</label>
            <input class="form-input password-input" type="password" id="pass" name="pass" placeholder="Contraseña" required>
            <span class="material-symbols-outlined password-toggle" onclick="alternarVisibilidad()">visibility_off</span>
        </div>        
        <?php
            // Muestra mensaje de error según corresponda.
            if (isset($_SESSION['login_error'])): ?>
            <div class="error-message">
                <?php echo($_SESSION['login_error']); ?>
            </div>
            <?php unset($_SESSION['login_error']); ?>
        <?php endif; ?>
        <button class="submit-btn" type="submit" name="login">Iniciar Sesión</button>
    </form>
</div>
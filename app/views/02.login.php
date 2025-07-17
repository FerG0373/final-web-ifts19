<h2>Iniciar Sesión</h2>

<form action="" method="POST"> 
    <div>
        <label for="username">Usuario:</label>
        <input type="text" id="username" name="username" placeholder="Usuario" required>
    </div>
    <div>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
        <span class="material-symbols-outlined" onclick="alternarVisibilidad()">visibility_off</span>
    </div>
    <button type="submit" name="login">Iniciar Sesión</button>
</form>
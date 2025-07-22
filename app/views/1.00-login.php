<h2>Iniciar Sesión</h2> 
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
    <button type="submit" name="login">Iniciar Sesión</button>
</form>
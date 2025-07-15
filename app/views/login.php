<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="stylesheet" href="./styles/style.css">
</head>
<body>
    <main class="contenedor-principal">

        <h1 class="contenido__titulo">Marca o Logo</h1>

        <div class="contenedor-formulario">
            <form action="" method="post" class="contenido__formulario">
    
                <h2 class="contenido__formulario__subtitulo">Crear cuenta</h2>
                
                <label for="nombre">Tu nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombres" required>
        
                <label for="apellido">Apellido:</label>
                <input type="text" id="apellido" name="apellido" placeholder="Apellidos" required>
        
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
        
                <label for="confirm-email">Vuelva a escribir su email:</label>
                <input type="email" id="confirm-email" name="confirm-email" required>
        
                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Como mínimo 6 caracteres" required>
        
                <label for="confirm-contraseña">Vuelve a escribir la contraseña:</label>
                <input type="password" id="confirm-contraseña" name="confirm-contraseña" required>
        
                <input type="submit" value="Crear cuenta" class="contenido__formulario__boton">

                <p class="contenido__parrafo">¿Ya tenés una cuenta?</p>
                <a href="" class="contenido__parrafo">Iniciar Sesión</a>
            </form>
        </div>
    </main>
    <footer class="footer">
        <p>CFP Nº 6 - Curso de Programación Web</p>
    </footer>
</body>
</html>


<!-- <div class="login-container">
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error_message)): ?>
        <p class="error-message"><?php echo $error_message; ?></p>
    <?php endif; ?>
    <form action="index.php" method="POST">
        <div class="input-group">
            <label for="username">Usuario:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div class="input-group password-group">
            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>
            <span class="password-toggle" onclick="togglePasswordVisibility()">👁️</span>
        </div>
        <button type="submit" name="login">Ingresar</button>
    </form>
</div>

<script>
    // Este script podrías moverlo a public/assets/js/script.js después
    function togglePasswordVisibility() {
        const passwordField = document.getElementById('password');
        const toggleIcon = document.querySelector('.password-toggle');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            toggleIcon.textContent = '🙈'; // Ojo tachado o cerrado
        } else {
            passwordField.type = 'password';
            toggleIcon.textContent = '👁️'; // Ojo abierto
        }
    }
</script> -->
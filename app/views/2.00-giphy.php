<h1>Buscador de GIFs con Giphy</h1>

<img src="" alt="Logo Gif.os">

<div id="container-busqueda">
    <label for="input-busqueda-giphy">Buscar</label>
    <input type="text" id="input-busqueda-giphy" placeholder="Buscá los GIFs que quieras..." value="">
    <button id="button-busqueda-giphy">Lupa</button>
</div>

<p>ZONA DE GIFS OBTENIDOS EN LA BÚSQUEDA</p>
<div id="container-resultados-busqueda">
    <!-- Los GIFs se insertarán acá dinámicamente con JavaScript -->
    <p>Cargando GIFs...</p>
</div>

<p>ZONA DE GIFS RANDOM</p>
<div id="container-resultados-random">
    <p>Cargando GIFs...</p>
</div>



<!-- Inyectar la API Key de Giphy en una variable JavaScript global -->
<script>
    const GIPHY_API_KEY_CLIENTE = '<?= htmlspecialchars($giphyApiKey ?? '') ?>';
</script>

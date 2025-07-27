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
<div id="container-resultado-random">
    <p>Cargando GIFs...</p>
</div>

<script src="assets/js/giphy.js"></script>
<script>
    // Llama a la función con la API key después de cargar giphy.js
    buscarGifRandom('<?= htmlspecialchars($giphyApiKey ?? '') ?>');
</script>
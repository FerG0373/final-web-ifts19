<section class="giphy-section">
    <h2 class="giphy-title">Buscador de GIFs con Giphy</h2>

    <!-- Buscador -->
    <div id="container-busqueda" class="search-container">
        <div class="input-container">
            <div class="input-group">
                <label for="input-busqueda-giphy" class="search-label">Buscar:</label>
                <input type="text" id="input-busqueda-giphy" class="search-input" placeholder="Buscá los GIFs que quieras...">
            </div>
            <div class="input-group">
                <label for="input-limite-giphy" class="limit-label">Límite:</label>
                <input type="number" id="input-limite-giphy" class="limit-input" min="1" max="40" placeholder="Cantidad (máx. 40)">
            </div>
        </div>

        <button id="button-busqueda-giphy" class="search-button">
            <svg class="search-icon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
            Buscar
        </button>
    </div>
    
    <!-- Resultados de búsqueda -->
    <p class="results-title">ZONA DE GIFS OBTENIDOS EN LA BÚSQUEDA</p>
    <div id="container-resultados-busqueda" class="gif-results-container">
        <p class="placeholder">...Buscá tus GIFs...</p>
    </div>
    
    <!-- GIFs random -->
    <p class="results-title">ZONA DE GIFS RANDOM</p>
    <div id="container-resultado-random" class="gif-random-container">
        <p class="placeholder">Cargando GIFs...</p>
    </div>
</section>



<!-- Scripts -->
<script src="assets/js/giphy.js"></script>
<script>
    // Llama a la función con la API key después de cargar giphy.js
    const giphyApiKey = "<?= htmlspecialchars($giphyApiKey ?? '') ?>";  // Trae la API Key desde php a JavaScript.
    cargaGifsRandom(giphyApiKey);
</script>

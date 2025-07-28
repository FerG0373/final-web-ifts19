function cargaGifsRandom(apiKey) {
    // 1. Obtener el container en HTML.
    const container = document.getElementById('container-resultado-random');
    // 2. Limpiar el container antes de agregar los GIFs.
    container.textContent = '';

    // 3. Realizar 4 peticiones fetch independientes a la API de Giphy.
    for (let i = 0; i < 4; i++) {
    fetch(`https://api.giphy.com/v1/gifs/random?api_key=${apiKey}&tag=&rating=g`)
        .then(response => response.json())
        .then(data => {
        // 4. Crear el elemento img.
        const img = document.createElement('img');
        img.src = data.data.images.original.url;
        img.alt = data.data.title || 'GIF Aleatorio de Giphy';
        img.classList.add('gif-item');
        // 5. Agregar el elemento img al div contenedor.
        container.appendChild(img);
        })
        .catch(error => console.error('Error al cargar GIF:', error));
    }
}


function buscaGifs(apiKey, elementoBuscado, limite = 4) {
    const container = document.getElementById('container-resultados-busqueda');
    container.textContent = '';

    fetch(`https://api.giphy.com/v1/gifs/search?api_key=${apiKey}&q=${elementoBuscado}&limit=${limite}&rating=g`)
        .then(response => response.json())
        .then(data => {
            if (!data.data || data.data.length === 0) {
                container.textContent = 'No se encontraron GIFs para la búsqueda.';
                return;
            }
            data.data.forEach(gif => {
                const img = document.createElement('img');
                img.src = gif.images.original.url;
                img.alt = gif.title || 'GIF de Giphy';
                img.classList.add('gif-item');
                container.appendChild(img);
            });
        });
}

// Evento del botón.
document.getElementById('button-busqueda-giphy').onclick = () => {
    const elementoBuscado = document.getElementById('input-busqueda-giphy').value.trim();
    const limite = document.getElementById('input-limite-giphy').value.trim() || 4; // Valor 4 por defecto si no se especifica.
    if (elementoBuscado) buscaGifs(giphyApiKey, elementoBuscado, limite);
};



















// function gifRandom(apiKey) {
//     fetch(`https://api.giphy.com/v1/gifs/random?api_key=${apiKey}&tag=&rating=g`)
//     .then(response => response.json())
//     .then(data => {
//         console.log(data)
        
//         // 1. Obtener el container en HTML.
//         const container = document.getElementById('container-resultado-random');

//         // 2. Crear el elemento img.
//         const img = document.createElement('img');
//         img.src = data.data.images.original.url;
//         img.alt = data.data.title || 'GIF Aleatorio de Giphy';
//         img.classList.add('gif-item');
        
//         // 3. Limpiar el container antes de agregar el nuevo GIF.
//         container.innerHTML = '';
//         container.appendChild(img);
//     })
// }
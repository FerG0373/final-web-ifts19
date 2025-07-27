function buscarGifsRandom(apiKey) {
    // 1. Obtener el container en HTML.
    const container = document.getElementById('container-resultado-random');
    // 2. Limpiar el container antes de agregar los GIFs.
    container.innerHTML = '';

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






// function buscarGifRandom(apiKey) {
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
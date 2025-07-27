function buscarGifRandom(apiKey) {
    fetch(`https://api.giphy.com/v1/gifs/random?api_key=${apiKey}&tag=&rating=g`)
    .then(response => response.json())
    .then(data => {
        console.log(data)
        
        // 1. Obtener el container en HTML.
        const container = document.getElementById('container-resultado-random');

        // 2. Crear el elemento img.
        const img = document.createElement('img');
        img.src = data.data.images.original.url;
        img.alt = data.data.title || 'GIF Aleatorio de Giphy';
        
        // 3. Limpiar el container antes de agregar el nuevo GIF.
        container.innerHTML = '';
        container.appendChild(img);
    })
}


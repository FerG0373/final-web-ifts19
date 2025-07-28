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


function buscaGifs(apiKey, elementoBuscado, limite) {
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

// Función para ejectar la función buscaGifs().
function ejecutarBusqueda() {
    const elementoBuscado = document.getElementById('input-busqueda-giphy').value.trim();
    const limite = parseInt(document.getElementById('input-limite-giphy').value.trim()) || 4;
    if (elementoBuscado) buscaGifs(giphyApiKey, elementoBuscado, limite);
}

// Función para manejar el evento keydown y disparar la búsqueda si se presiona Enter.
const teclaEnter = (e) => {
    if (e.key === 'Enter') ejecutarBusqueda();
}

document.getElementById('input-busqueda-giphy').addEventListener('keydown', teclaEnter);
document.getElementById('input-limite-giphy').addEventListener('keydown', teclaEnter);
document.getElementById('button-busqueda-giphy').addEventListener('click', ejecutarBusqueda);




// // Evento del botón (click).
// document.getElementById('button-busqueda-giphy').addEventListener('click', () => {    
//     let elementoBuscado = document.getElementById('input-busqueda-giphy').value.trim();
//     let limite = parseInt(document.getElementById('input-limite-giphy').value.trim()) || 4; // Valor 4 por defecto si no se especifica.
//     if (elementoBuscado) buscaGifs(giphyApiKey, elementoBuscado, limite);
// });


// // Evento del input (keydown)
// document.getElementById('input-busqueda-giphy').addEventListener('keydown', (e) => {
//     if (e.key === 'Enter') {
//         let elementoBuscado = e.target.value.trim();
//         let limite = parseInt(document.getElementById('input-limite-giphy').value.trim()) || 4;
//         if (elementoBuscado) buscaGifs(giphyApiKey, elementoBuscado, limite);
//     }
// });

// // Evento del limite (keydown)
// document.getElementById('input-limite-giphy').addEventListener('keydown', (e) => {
//     if (e.key === 'Enter') {
//         let elementoBuscado = document.getElementById('input-busqueda-giphy').value.trim();
//         let limite = parseInt(e.target.value.trim()) || 4; // Usamos e.target para el límite
//         if (elementoBuscado) buscaGifs(giphyApiKey, elementoBuscado, limite);
//     }
// });


// Uso e.target en vez de getElementById porque es más directo y rápido, en este caso, al tener un evento delegado.




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
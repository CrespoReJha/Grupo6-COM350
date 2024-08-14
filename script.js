document.getElementById('pagos').addEventListener('click', function(event) {
    event.preventDefault();

    mostrarContenido();
});

function mostrarContenido() {
    fetch('listar_pagos.php') 
        .then(response => response.text())
        .then(data => {
            document.getElementById('contenido').innerHTML = data;
        })
        .catch(error => console.error('Error al cargar el contenido:', error));
}

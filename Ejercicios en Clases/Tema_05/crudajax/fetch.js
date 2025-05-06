function cargarContenido(ruta) {
    fetch(ruta)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#contenido').innerHTML = html;
        })
        .catch(error => console.error('Error al cargar contenido:', error));
}

function crear() {
    const datos = new FormData(document.querySelector('#form-insertar'));
    fetch("create.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        document.querySelector('#contenido').innerHTML = data;
    })
    .catch(error => console.error('Error al crear:', error));
}

function formEditar(id) {
    fetch(`formeditar.php?id=${id}`)
        .then(response => response.text())
        .then(html => {
            document.querySelector('#contenido').innerHTML = html;
        })
        .catch(error => console.error('Error al cargar formulario:', error));
}

function editar() {
    const datos = new FormData(document.querySelector('#form-editar'));
    fetch("edit.php", {
        method: "POST",
        body: datos
    })
    .then(response => response.text())
    .then(data => {
        document.querySelector('#contenido').innerHTML = data;
    })
    .catch(error => console.error('Error al editar:', error));
}

function eliminar(id) {
    if (confirm("¿Estás seguro de que deseas eliminar este registro?")) {
        fetch(`delete.php?id=${id}`)
            .then(response => response.text())
            .then(data => {
                document.querySelector('#contenido').innerHTML = data;
            })
            .catch(error => console.error('Error al eliminar:', error));
    }
}

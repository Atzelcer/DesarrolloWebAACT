function mostrarMensaje(tipo, texto) {
    const div = document.createElement('div');
    div.className = `mensaje ${tipo}`;
    div.textContent = texto;
    document.querySelector('#contenido').prepend(div);
    setTimeout(() => div.remove(), 3000);
}

async function cargarContenido(ruta) {
    try {
        const res = await fetch(ruta);
        if (!res.ok) throw new Error('No se pudo cargar el contenido');
        const data = await res.text();
        document.querySelector('#contenido').innerHTML = data;
    } catch (err) {
        mostrarMensaje('error', err.message);
    }
}

async function crear() {
    try {
        const form = document.querySelector('#form-insertar');
        const datos = new FormData(form);

        const res = await fetch('create.php', {
            method: 'POST',
            body: datos
        });

        if (!res.ok) throw new Error('No se pudo crear el registro');
        const respuesta = await res.text();

        mostrarMensaje('exito', respuesta);

        const modal = form.closest('.modal');
        if (modal) modal.remove();

        cargarContenido('read.php');
    } catch (err) {
        mostrarMensaje('error', err.message);
    }
}

async function formEditar(id) {
    try {
        const res = await fetch(`formeditar.php?id=${id}`);
        if (!res.ok) throw new Error('No se pudo cargar el formulario');
        const html = await res.text();

        const modal = document.createElement('div');
        modal.className = 'modal';
        modal.innerHTML = `
            <div class="modal-contenido">
                <span class="cerrar-modal">&times;</span>
                ${html}
            </div>
        `;

        document.body.appendChild(modal);
        modal.querySelector('.cerrar-modal').onclick = () => modal.remove();
    } catch (err) {
        mostrarMensaje('error', err.message);
    }
}

async function editar() {
    try {
        const form = document.querySelector('#form-editar');
        const datos = new FormData(form);

        const res = await fetch('edit.php', {
            method: 'POST',
            body: datos
        });

        if (!res.ok) throw new Error('No se pudo actualizar el registro');
        const resultado = await res.text();

        mostrarMensaje('exito', resultado);
        document.querySelector('.modal').remove();
        cargarContenido('read.php');
    } catch (err) {
        mostrarMensaje('error', err.message);
    }
}

async function eliminar(id) {
    const confirmar = confirm('Seguro que deseas eliminar este elemento?');
    if (!confirmar) return;

    try {
        const res = await fetch(`delete.php?id=${id}`);
        if (!res.ok) throw new Error('No se pudo eliminar el registro');
        const mensaje = await res.text();

        mostrarMensaje('exito', mensaje);
        cargarContenido('read.php');
    } catch (err) {
        mostrarMensaje('error', err.message);
    }
}

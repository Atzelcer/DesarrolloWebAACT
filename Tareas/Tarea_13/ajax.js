// Función para mostrar alertas
function mostrarAlerta(tipo, mensaje) {
    const alerta = document.createElement('div');
    alerta.className = `alert alert-${tipo} alert-dismissible fade show alert-position`;
    alerta.innerHTML = `
        ${mensaje}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    `;
    
    document.body.appendChild(alerta);
    
    setTimeout(() => {
        const bsAlert = new bootstrap.Alert(alerta);
        bsAlert.close();
    }, 5000);
}

async function cargarContenido(abrir) {
    try {
        const response = await fetch(abrir);
        if (!response.ok) throw new Error('Error al cargar contenido');
        const html = await response.text();
        document.querySelector('#contenido').innerHTML = html;
    } catch (error) {
        mostrarAlerta('danger', error.message);
    }
}

async function crear() {
    const form = document.querySelector('#form-insertar');
    const btnSubmit = form.querySelector('[type="submit"]');
    
    try {
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            return;
        }

        // Mostrar spinner en el botón
        btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...';
        btnSubmit.disabled = true;

        const formData = new FormData(form);
        const response = await fetch('create.php', {
            method: 'POST',
            body: formData
        });
        
        if (!response.ok) throw new Error('Error al crear registro');
        const resultado = await response.text();

        // Cerrar modal y recargar lista
        bootstrap.Modal.getInstance(document.getElementById('formModal')).hide();
        mostrarAlerta('success', resultado);
        cargarContenido('read.php');
    } catch (error) {
        mostrarAlerta('danger', error.message);
    } finally {
        // Restaurar botón
        btnSubmit.innerHTML = 'Guardar';
        btnSubmit.disabled = false;
    }
}

async function formEditar(id) {
    try {
        const response = await fetch(`formeditar.php?id=${id}`);
        if (!response.ok) throw new Error('Error al cargar formulario');
        const html = await response.text();
        
        document.getElementById('modalContent').innerHTML = html;
        const modal = new bootstrap.Modal(document.getElementById('formModal'));
        modal.show();
    } catch (error) {
        mostrarAlerta('danger', error.message);
    }
}

async function editar() {
    const form = document.querySelector('#form-editar');
    const btnSubmit = form.querySelector('[type="submit"]');
    
    try {
        if (!form.checkValidity()) {
            form.classList.add('was-validated');
            return;
        }

        // Mostrar spinner en el botón
        btnSubmit.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Guardando...';
        btnSubmit.disabled = true;

        const formData = new FormData(form);
        const response = await fetch('edit.php', {
            method: 'POST',
            body: formData
        });
        
        if (!response.ok) throw new Error('Error al actualizar registro');
        const resultado = await response.text();

        // Cerrar modal y recargar lista
        bootstrap.Modal.getInstance(document.getElementById('formModal')).hide();
        mostrarAlerta('success', resultado);
        cargarContenido('read.php');
    } catch (error) {
        mostrarAlerta('danger', error.message);
    } finally {
        // Restaurar botón
        btnSubmit.innerHTML = 'Guardar Cambios';
        btnSubmit.disabled = false;
    }
}

async function eliminar(id) {
    if (!confirm("¿Estás seguro que deseas eliminar este registro?")) return;
    
    try {
        const response = await fetch(`delete.php?id=${id}`);
        if (!response.ok) throw new Error('Error al eliminar registro');
        const resultado = await response.text();
        
        mostrarAlerta('success', resultado);
        cargarContenido('read.php');
    } catch (error) {
        mostrarAlerta('danger', error.message);
    }
}

// Función global para mostrar formulario de creación
window.mostrarFormularioCrear = async function() {
    try {
        const response = await fetch('forminsertar.html');
        if (!response.ok) throw new Error('Error al cargar formulario');
        const html = await response.text();
        
        document.getElementById('modalContent').innerHTML = html;
        const modal = new bootstrap.Modal(document.getElementById('formModal'));
        modal.show();
    } catch (error) {
        mostrarAlerta('danger', error.message);
    }
}
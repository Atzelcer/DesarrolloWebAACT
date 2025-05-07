function obtenerDepartamentos() {
    fetch("departamento.php")
        .then(res => res.text()) 
        .then(html => {
            const d = document.querySelector('#departamento');
            const p = document.querySelector('#provincia');
            const m = document.querySelector('#municipio');

            d.innerHTML = "<option value=''>Seleccione un departamento</option>" + html;
            p.innerHTML = "<option value=''>Seleccione una provincia</option>";
            m.innerHTML = "<option value=''>Seleccione un municipio</option>";

            p.disabled = true;
            m.disabled = true;
        })
        .catch(err => console.error("Error al cargar departamentos:", err));
}

function obtenerProvincias() {
    const departamento_id = document.getElementById('departamento').value;
    const p = document.getElementById('provincia');
    const m = document.getElementById('municipio');

    p.innerHTML = "<option value=''>Seleccione una provincia</option>";
    m.innerHTML = "<option value=''>Seleccione un municipio</option>";
    m.disabled = true;

    if (!departamento_id) {
        p.disabled = true;
        return;
    }

    fetch(`provincia.php?id=${departamento_id}`)
        .then(res => res.text()) 
        .then(html => {
            p.innerHTML += html;
            p.disabled = false;
        })
        .catch(err => console.error("Error al cargar provincias:", err));
}

function obtenerMunicipios() {
    const provincia_id = document.getElementById('provincia').value;
    const m = document.getElementById('municipio');

    m.innerHTML = "<option value=''>Seleccione un municipio</option>";

    if (!provincia_id) {
        m.disabled = true;
        return;
    }

    fetch(`municipio.php?id=${provincia_id}`)
        .then(res => res.text()) 
        .then(html => {
            m.innerHTML += html;
            m.disabled = false;
        })
        .catch(err => console.error("Error al cargar municipios:", err));
}

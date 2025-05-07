function obtenerDepartamentos() {
    fetch("departamento.php")
        .then(response => response.json())
        .then(lista => {
            const select = document.querySelector('#departamento');
            select.innerHTML = '<option value="">Seleccione un departamento</option>';
            lista.forEach(dep => {
                const option = document.createElement('option');
                option.value = dep.id;
                option.textContent = dep.nombre;
                select.appendChild(option);
            });

            document.getElementById('provincia').innerHTML = '<option value="">Seleccione una provincia</option>';
            document.getElementById('provincia').disabled = true;
            document.getElementById('municipio').innerHTML = '<option value="">Seleccione un municipio</option>';
            document.getElementById('municipio').disabled = true;
        })
        .catch(error => console.error("Error al cargar departamentos:", error));
}

function obtenerProvincias() {
    const departamento_id = document.getElementById('departamento').value;
    const provinciaSelect = document.getElementById('provincia');
    const municipioSelect = document.getElementById('municipio');

    provinciaSelect.innerHTML = '<option value="">Seleccione una provincia</option>';
    municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>';
    municipioSelect.disabled = true;

    if (!departamento_id) {
        provinciaSelect.disabled = true;
        return;
    }

    fetch(`provincia.php?id=${departamento_id}`)
        .then(response => response.json())
        .then(lista => {
            lista.forEach(prov => {
                const option = document.createElement('option');
                option.value = prov.id;
                option.textContent = prov.nombre;
                provinciaSelect.appendChild(option);
            });

            provinciaSelect.disabled = false;
        })
        .catch(error => console.error("Error al cargar provincias:", error));
}

function obtenerMunicipios() {
    const provincia_id = document.getElementById('provincia').value;
    const municipioSelect = document.getElementById('municipio');

    municipioSelect.innerHTML = '<option value="">Seleccione un municipio</option>';

    if (!provincia_id) {
        municipioSelect.disabled = true;
        return;
    }

    fetch(`municipio.php?id=${provincia_id}`)
        .then(response => response.json())
        .then(lista => {
            lista.forEach(mun => {
                const option = document.createElement('option');
                option.value = mun.id;
                option.textContent = mun.nombre;
                municipioSelect.appendChild(option);
            });

            municipioSelect.disabled = false;
        })
        .catch(error => console.error("Error al cargar municipios:", error));
}

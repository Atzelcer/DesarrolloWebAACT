
window.onload = function () {
    mostrarInicio();

    document.querySelectorAll('.boton').forEach(boton => {
        const texto = boton.textContent.trim();

        boton.addEventListener('click', function () {
            agregarAlHistorial(texto);

            if (texto === "Inicio") {
                mostrarInicio();
            }

            if (boton.textContent === "Pregunta 1") {
                fetch('galeria.php')
                    .then(response => response.text())
                    .then(data => {
                        document.getElementById('contenido').innerHTML = data;
                    });
            }

            if (texto === "Pregunta 2") {
                crearTablaYCombo();
            }

            if (texto === "Pregunta 3") {
                mostrarLoginModal();
            }

            if (texto === "Pregunta 4") {
                fetch("verificar_sesion.php")
                    .then(res => res.json())
                    .then(data => {
                        if (data.loggeado) {
                            cargarListaLibros();
                        } else {
                            mostrarLoginModal(() => {
                                cargarListaLibros();
                            });
                        }
                    });
            }
        });
    });

    document.getElementById("menu").addEventListener("click", function () {
        const botones = document.querySelectorAll(".boton:not(:first-child)");
        botones.forEach(btn => {
            btn.style.display = (btn.style.display === "none") ? "inline-block" : "none";
        });
    });
};


// -- Maquetacion


function mostrarInicio() {
    const nombre = "Cervantes Torres Atzel Alan";
    const cu = "111 - 481";
    const fecha = new Date().toLocaleDateString();

    const contenido = `
        <h2>Bienvenido</h2>
        <p><strong>Nombre:</strong> ${nombre}</p>
        <p><strong>CU:</strong> ${cu}</p>
        <p><strong>Fecha:</strong> ${fecha}</p>
        <p><strong>Numero Visitas:</strong> <span id="visitas"></span></p>
    `;
    document.getElementById("contenido").innerHTML = contenido;

    const xhr = new XMLHttpRequest();
    xhr.open("GET", "contador.php", true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById("visitas").innerText = xhr.responseText;
        }
    };
    xhr.send();
}

function agregarAlHistorial(texto) {
    const divHistorial = document.getElementById("historial");
    const p = document.createElement("p");
    p.textContent = texto;
    divHistorial.appendChild(p);
}


// -- Pregunta 1


function mostrarModal(imagen) {
    const modal = document.createElement('div');
    modal.id = 'modal';
    modal.innerHTML = `
        <div id="modal-contenido">
            <img src="img/${imagen}" width="600" height="600">
            <br><button onclick="cerrarModal()">Aceptar</button>
        </div>
    `;
    document.body.appendChild(modal);
}

function cerrarModal() {
    const modal = document.getElementById('modal');
    if (modal) modal.remove();
}

// - PREGUNTA 2

function crearTablaYCombo() {
    const secciones = ['contenido', 'historial', 'barra'];
    const colores = ['yellowgreen', 'red', 'black', 'orange', 'purple', 'gray', 'magenta', 'yellow', 'brown'];

    const combo = document.createElement('select');
    combo.id = 'selector-seccion';
    secciones.forEach(sec => {
        const opt = document.createElement('option');
        opt.value = sec;
        opt.textContent = sec;
        combo.appendChild(opt);
    });

    const tabla = document.createElement('table');
    tabla.style.borderCollapse = 'collapse';

    let colorIndex = 0;
    for (let i = 0; i < 3; i++) {
        const fila = document.createElement('tr');
        for (let j = 0; j < 3; j++) {
            const celda = document.createElement('td');
            celda.style.padding = 'center';
            celda.style.alignContent = 'center';
            celda.style.width = '100px';
            celda.style.height = '100px';
            celda.style.border = '2px solid #000';
            celda.style.backgroundColor = colores[colorIndex++];
            celda.style.cursor = 'pointer';

            celda.addEventListener('click', () => {
                const seccion = document.getElementById('selector-seccion').value;
                document.getElementById(seccion).style.backgroundColor = celda.style.backgroundColor;
            });

            fila.appendChild(celda);
        }
        tabla.appendChild(fila);
    }

    const contenedor = document.getElementById('contenido');
    contenedor.innerHTML = '';
    contenedor.appendChild(combo);
    contenedor.appendChild(tabla);
}


// --- Pregunta 3 


function mostrarLoginModal(callback = null) {
    const modal = document.createElement('div');
    modal.id = 'modal';
    modal.innerHTML = `
        <div id="modal-contenido">
            <h3>Iniciar sesión</h3>
            <input type="text" id="user" placeholder="Usuario"><br><br>
            <input type="password" id="pass" placeholder="Contraseña"><br><br>
            <button onclick="enviarLogin(${callback ? 'true' : 'false'})">Aceptar</button>
            <button onclick="cerrarModal()">Cancelar</button>
            </div>
    `;
    document.body.appendChild(modal);
    modal.dataset.callback = callback ? "1" : "0";
}

function enviarLogin(ejecutarCallback) {
    const usuario = document.getElementById('user').value;
    const password = document.getElementById('pass').value;

    fetch("login.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: `usuario=${encodeURIComponent(usuario)}&password=${encodeURIComponent(password)}`
    })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById("modal").remove();
                document.getElementById("menu").textContent = data.nombre;

                const barra = document.querySelector(".barra");
                const info = document.createElement("div");
                info.className = "boton";
                info.innerHTML = `${data.correo} | Nivel: ${data.nivel}`;
                barra.appendChild(info);

                if (ejecutarCallback) {
                    cargarListaLibros();
                }
            } else {
                alert("Credenciales incorrectas");
            }
        });
}


// --Pregunta 4 


function cargarListaLibros() {
    fetch("listar.php")
        .then(res => res.text())
        .then(data => {
            document.getElementById("contenido").innerHTML = data;
        });
}

function verLibro(id) {
    fetch("verlibro.php?id=" + id)
        .then(res => res.text())
        .then(data => {
            const modal = document.createElement("div");
            modal.id = "modal";
            modal.innerHTML = `
                <div id="modal-contenido">
                    ${data}
                    <br><button onclick="cerrarModal()">Cancelar</button>
                </div>
            `;
            document.body.appendChild(modal);
        });
}

function cerrarModal() {
    const modal = document.getElementById("modal");
    if (modal) modal.remove();
}


// -- Guardar cambios de los libros


function guardarCambiosLibro() {
    const form = document.getElementById("formEditarLibro");
    const datos = new FormData(form);

    fetch("actualizar_libro.php", {
        method: "POST",
        body: datos
    })
        .then(res => res.text())
        .then(resp => {
            if (resp.trim() === "OK") {
                alert("Libro actualizado correctamente");
                cerrarModal();
                cargarListaLibros();
            } else {
                alert("Error al actualizar: " + resp);
            }
        });
}

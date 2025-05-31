function cargarContenido(pagina) {
  var ajax = new XMLHttpRequest();
  ajax.open("GET", pagina, true);
  ajax.onreadystatechange = function () {
    if (ajax.readyState === 4 && ajax.status === 200) {
      document.getElementById("contenido").innerHTML = ajax.responseText;
      if (pagina === "selectLibros.html") {
        setTimeout(cargarLibros, 200);
      }
    }
  };
  ajax.send(null);
}

function cargarLibros() {
  fetch("datos.php")
    .then(res => res.json())
    .then(libros => {
      var select = document.getElementById("libros");
      select.innerHTML = "<option value=''>Seleccione...</option>";
      libros.forEach(libro => {
        var option = document.createElement("option");
        option.value = libro.imagen;
        option.textContent = libro.titulo;
        select.appendChild(option);
      });
    })
    .catch(err => {
      alert("Error cargando libros: " + err);
    });
}

function mostrarImagenLibro() {
  var select = document.getElementById("libros");
  var img = document.getElementById("imagen-libro");
  if (select.value !== "") {
    img.src = "imagenes/" + select.value;
    img.style.display = "block";
  } else {
    img.style.display = "none";
  }
}




function iniciarTresEnRaya() {
    var turno = "X";
    var botones = document.getElementsByClassName("celda");
    var mensaje = document.getElementById("mensaje");

    mensaje.innerHTML = "Turno: " + turno;

    for (var i = 0; i < botones.length; i++) {
        (function (indice) {
            botones[indice].onmouseover = function () {
                if (this.innerHTML === "") {
                    this.style.backgroundColor = (turno === "X") ? "#cce5ff" : "#ffcccc";
                }
            };

            botones[indice].onmouseout = function () {
                if (this.innerHTML === "") {
                    this.style.backgroundColor = "#ffffff";
                }
            };

            botones[indice].onclick = function () {
                if (this.innerHTML === "") {
                    this.innerHTML = turno;
                    this.style.color = (turno === "X") ? "blue" : "red";
                    turno = (turno === "X") ? "O" : "X";
                    mensaje.innerHTML = "Turno: " + turno;
                }
            };
        })(i);
    }
}

function generarTabla() {
    var base = parseInt(document.getElementById("base").value);
    var limite = parseInt(document.getElementById("limite").value);
    var operacion = document.querySelector('input[name="op"]:checked');
    var resultado = document.getElementById("resultado");

    // Validaciones
    if (isNaN(base) || base >= 10) {
        resultado.innerHTML = "Ingrese un número base menor a 10.";
        return;
    }
    if (isNaN(limite) || limite <= 1) {
        resultado.innerHTML = "Ingrese un límite mayor a 1.";
        return;
    }
    if (!operacion) {
        resultado.innerHTML = "Seleccione una operación.";
        return;
    }

    var op = operacion.value;
    var salida = "";

    for (var i = 1; i <= limite; i++) {
        var linea = "";

        if (op === "suma") {
            linea = base + " + " + i + " = " + (base + i);
        } else if (op === "resta") {
            linea = base + " - " + i + " = " + (base - i);
        } else if (op === "multiplicacion") {
            linea = base + " x " + i + " = " + (base * i);
        } else if (op === "division") {
            var division = (base / i).toFixed(2);
            linea = base + " / " + i + " = " + division;
        }

        salida += linea + "<br>";
    }

    resultado.innerHTML = salida;
}


function cargarContenido(pagina) {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", pagina, true);

    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            if (pagina === "listar.php" && ajax.responseText.trim() === "NO_LOGIN") {
                mostrarModalLogin(); 
                return;
            }

            document.getElementById("contenido").innerHTML = ajax.responseText;

            if (pagina === "tresenraya.html") {
                iniciarTresEnRaya();
            }
        }
    };

    ajax.send(null);
}

function mostrarModalLogin() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "login_modal.html", true);

    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            var contenedor = document.createElement("div");
            contenedor.innerHTML = ajax.responseText;
            document.body.appendChild(contenedor);
            prepararLoginDesdeModal();
        }
    };

    ajax.send(null);
}

function prepararLoginDesdeModal() {
    var form = document.getElementById("form-login");

    form.addEventListener("submit", function (e) {
        e.preventDefault();

        var correo = document.getElementById("correo").value.trim(); 
        var clave = document.getElementById("clave").value;

        var datos = new FormData();
        datos.append("correo", correo);
        datos.append("clave", clave);

        fetch("login.php", {
            method: "POST",
            body: datos
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                document.getElementById("modal-login").remove(); 
                cargarContenido("listar.php"); 
            } else {
                alert(data.mensaje);
            }
        });
    });
}


function cambiarNivel(idUsuario) {
    var datos = new FormData();
    datos.append("id", idUsuario);

    var ajax = new XMLHttpRequest();
    ajax.open("POST", "cambiarNivel.php", true);

    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            alert(ajax.responseText); // ✅ muestra mensaje de confirmación
            cargarContenido("listar.php"); // ✅ actualiza la tabla
        }
    };

    ajax.send(datos);
}



function cerrarSesion() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "cerrar.php", true);

    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            if (ajax.responseText.trim() === "SESION_CERRADA") {
                document.getElementById("contenido").innerHTML = "";
                mostrarModalLogin(); 
            }
        }
    };

    ajax.send(null);
}

function ordenarLibros(orden) {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "listarLibros.php?orden=" + orden, true);

    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            document.getElementById("contenido").innerHTML = ajax.responseText;
        }
    };

    ajax.send(null);
}


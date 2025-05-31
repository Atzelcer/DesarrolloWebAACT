function iniciarTresEnRaya() {
    var turno = "X";
    var estado = ["", "", "", "", "", "", "", "", ""];

    var celdas = document.getElementsByClassName("celda");

    for (var i = 0; i < celdas.length; i++) {
        (function (indice) {
            celdas[indice].onmouseover = function () {
                if (this.innerHTML === "") {
                    this.style.backgroundColor = (turno === "X") ? "#cce5ff" : "#ffcccc";
                }
            };

            celdas[indice].onmouseout = function () {
                this.style.backgroundColor = "#ffffff";
            };

            celdas[indice].onclick = function () {
                if (this.innerHTML === "") {
                    this.innerHTML = turno;
                    this.style.color = (turno === "X") ? "blue" : "red";
                    estado[indice] = turno;

                    // Cambiar turno
                    turno = (turno === "X") ? "O" : "X";

                    // Mostrar turno actual
                    var mensaje = document.getElementById("mensaje");
                    mensaje.innerHTML = "Turno: " + turno;
                }
            };
        })(i);
    }
}


function cerrarSesion() {
    var ajax = new XMLHttpRequest();
    ajax.open("GET", "cerrar.php", true);

    ajax.onreadystatechange = function () {
        if (ajax.readyState === 4 && ajax.status === 200) {
            if (ajax.responseText.trim() === "SESION_CERRADA") {
                mostrarModalLogin();
            }
        }
    };

    ajax.send(null);
}


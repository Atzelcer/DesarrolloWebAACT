
function cargarMenu() {
  fetch('../formularios/botones.html')
    .then(response => response.text())
    .then(html => {
      document.getElementById('botonera').innerHTML = html;
      colocarMensaje();
    })
    .catch(error => console.error('Error cargando botones:', error));
}


function colocarMensaje() {
  const nombre = "CERVANTES TORRES ATZEL ALAN";
  const carnet = "111 - 481";
  document.getElementById('mensaj').textContent = `Nombre: ${nombre} | CU: ${carnet}`;
}


function cargarPregunta(num) {
  const contenedor = document.getElementById('princip');

  switch (num) {
    case 2:
      fetch('../../backend/PHP/galeria.php')
        .then(res => res.text())
        .then(html => {
          contenedor.innerHTML = html;
          activarModalLibros();
        })
        .catch(err => console.error('Error en galeria.php:', err));
      break;

    case 3: 
      fetch('../formularios/formulario.html')
        .then(res => res.text())
        .then(html => {
          contenedor.innerHTML = html;

          if (typeof $ === 'undefined') {
            const script = document.createElement('script');
            script.src = "https://code.jquery.com/jquery-3.6.0.min.js";
            script.onload = iniciarAjaxFormulario;
            document.head.appendChild(script);
          } else {
            iniciarAjaxFormulario();
          }
        })
        .catch(err => console.error('Error en formulario.html:', err));
      break;

    default:
      contenedor.innerHTML = `<h3>Contenido de la Pregunta ${num} aún no implementado.</h3>`;
  }
}


function iniciarAjaxFormulario() {
  $('#formLibro').on('submit', function (e) {
    e.preventDefault();

    const datos = new FormData(this);

    $.ajax({
      url: '../../backend/PHP/insertar_libro.php',
      method: 'POST',
      data: datos,
      contentType: false,
      processData: false,
      success: function (res) {
        if (res.trim() === 'ok') {
          alert('Libro registrado con éxito');
          cargarPregunta(2);
        } else {
          alert('Error: ' + res);
        }
      },
      error: function (xhr, status, error) {
        alert('Error AJAX: ' + error);
      }
    });
  });
}


function activarModalLibros() {
  const cards = document.querySelectorAll('.libro-card');
  cards.forEach(card => {
    card.addEventListener('click', () => {
      const libro = {
        imagen: card.dataset.imagen,
        titulo: card.dataset.titulo,
        autor: card.dataset.autor,
        anio: card.dataset.anio,
        editorial: card.dataset.editorial
      };
      mostrarModalCompleto(libro);
    });
  });
}

function mostrarModalCompleto(libro) {
  const modal = document.createElement('div');
  modal.id = "modal-img";
  modal.style.cssText = `
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background-color: rgba(0,0,0,0.6);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 9999;
  `;

  const contenido = document.createElement('div');
  contenido.style.cssText = `
    background: white;
    padding: 20px;
    width: 400px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0,0,0,0.3);
    text-align: center;
    font-family: Arial, sans-serif;
  `;

  const img = document.createElement('img');
  img.src = libro.imagen;
  img.alt = libro.titulo;
  img.style.width = "200px";
  img.style.height = "auto";
  img.style.marginBottom = "15px";

  const info = document.createElement('div');
  info.innerHTML = `
    <h2 style="margin-bottom: 10px;">${libro.titulo}</h2>
    <p><strong>Autor:</strong> ${libro.autor}</p>
    <p><strong>Año:</strong> ${libro.anio}</p>
    <p><strong>Editorial (ID):</strong> ${libro.editorial}</p>
  `;

  const btn = document.createElement('button');
  btn.textContent = "Aceptar";
  btn.onclick = () => modal.remove();
  btn.style.cssText = `
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #006080;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
  `;

  contenido.appendChild(img);
  contenido.appendChild(info);
  contenido.appendChild(btn);
  modal.appendChild(contenido);
  document.body.appendChild(modal);
}

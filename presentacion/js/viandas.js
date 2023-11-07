//VARIABLES
const btnVerMas = document.querySelector('#ver-mas');
const viandas = document.getElementById('viandas');
const btnAgregarViandas = document.querySelectorAll('.btn-carrito');
let arrayViandas = [];

let objArrayViandas = [];

//EVENTOS
btnVerMas.addEventListener('click', cargarViandas);

//FETCH
fetch('../persistencia/viandaJSON.php')
  .then((response) => response.json())
  .then((jsonData) => {
    //Utilizar jSON
    arrayViandas = jsonData;

    cargarViandas(arrayViandas);
  });

//FUNCIONES
function mostrarViandas(viandasJSON) {
  const viandasHTML = viandasJSON.map(
    (viandaActual) => `
    <fieldset id="vianda${viandaActual.id}">
      <legend>${viandaActual.nombre}</legend>
      <div>
        <div >
          <img src="assets/viandas/${viandaActual.imagen}" class="img">
        </div>
      </div>
      <div>
        <span>Precio: $${viandaActual.precio}</span>
        <br>
        <span>Duracion: ${viandaActual.tiempo} minutos</span>
        <br>
        <br>
        <span>Contenido: ${viandaActual.contenido}</span>
        <br>
        <input class="botons btn-carrito" onclick='agregarCarrito(${JSON.stringify(
          viandaActual
        )})' type="submit" value="Agregar al carrito">
      </div>
    </fieldset>
  `
  );

  // Unir todas las viandas en una sola cadena
  const contenidoHTML = viandasHTML.join('');

  // Asignar el contenido HTML al elemento viandas una sola vez
  viandas.innerHTML = contenidoHTML;
}

function cargarViandas(nuevasViandas) {
  const cantidadARecorrer = 4; // Cantidad de viandas a mostrar en cada carga
  const posicionActual = cargarViandas.posicionActual || 0; // Inicializar la posición actual si no está definida

  // Obtener las siguientes viandas a mostrar
  const siguientesViandas = arrayViandas.slice(
    posicionActual,
    posicionActual + cantidadARecorrer
  );

  // Mostrar las siguientes viandas
  mostrarViandas(siguientesViandas);

  // Actualizar la posición actual para la próxima carga
  cargarViandas.posicionActual = posicionActual + cantidadARecorrer;

  // Deshabilitar el botón "Ver más" si no hay más viandas por cargar
  if (cargarViandas.posicionActual >= nuevasViandas.length) {
    btnVerMas.setAttribute('disabled', true);
  }
}

function agregarCarrito(array) {
  console.log(array);
  let vianda = {
    id: array.id,
    nombre: array.nombre,
    tiempo: array.tiempo,
    precio: array.precio,
    imagen: array.imagen,
    contenido: array.contenido,
  };
  console.log(vianda);
  objArrayViandas.push(vianda);
  Swal.fire({
    title: 'Añadiendo al carrito',
    icon: 'success',
    timer: 2000,
    showConfirmButton: false,
  });

  localStorage.setItem('miCarrito', JSON.stringify(objArrayViandas));
}

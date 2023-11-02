//VARIABLES
const btnVerMas = document.querySelector('#ver-mas');
const viandas = document.getElementById('viandas');
let arrayViandas = [];

//EVENTOS
btnVerMas.addEventListener('click', cargarViandas);

fetch('../persistencia/viandaJSON.php')
  .then((response) => response.json())
  .then((jsonData) => {
    //Utilizar jSON
    arrayViandas = jsonData;

    cargarViandas(arrayViandas);
  });

function mostrarViandas(viandasJSON) {
  // Crear un arreglo para almacenar el contenido de todas las viandas
  const viandasHTML = viandasJSON.map(
    (viandaActual) => `
      <fieldset>
        <legend>${viandaActual.nombre}</legend>
        <div>
          <fieldset class="img">
            <img src="assets/viandas/${viandaActual.imagen}" class="img">
          </fieldset>
        </div>
        <div>
          <span>Precio: $${viandaActual.precio}</span>
          <br>
          <span>Duracion: ${viandaActual.tiempo} minutos</span>
          <br>
          <br>
          <span>Contenido: ${viandaActual.contenido}</span>
          <br>
          <input class="botons" type="submit" value="Agregar al carrito">
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

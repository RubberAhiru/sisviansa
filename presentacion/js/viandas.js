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
  let contenidoHTML = '';

  viandasJSON.forEach((viandaActual) => {
    contenidoHTML += `
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
    `;

    viandas.innerHTML = contenidoHTML;
  });
}

function cargarViandas(nuevasViandas) {
  let posicionActual = 0;
  const siguientesViandas = arrayViandas.splice(
    posicionActual,
    posicionActual + 4
  );

  siguientesViandas.forEach((vianda) => {
    mostrarViandas(siguientesViandas);
  });

  posicionActual += 4;
}

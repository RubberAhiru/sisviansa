//VARIABLES
let arrayViandas = [];

fetch('../persistencia/viandaJSON.php')
  .then((response) => response.json())
  .then((jsonData) => {
    //Utilizar jSON
    arrayViandas = jsonData;

    mostrarViandas(arrayViandas); //ej. para ver objeto en consola
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
      <label for="text">cosas</label>
      <br>
      <input type="text" id="1"  value="" />
      <br>
      <input class="botons" type="submit" value="Agregar al carrito">  
    </div>
  </fieldset>
    `;

    document.getElementById('viandas').innerHTML = contenidoHTML;
  });
}

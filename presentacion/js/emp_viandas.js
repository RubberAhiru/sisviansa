//VARIABLES
const formularioSeleccionado = document.getElementsByName('TipoFormulario');
const btnAgregarIngrediente = document.querySelector('#agregar-ingrediente');
const divIngredientes = document.getElementById('inputs-ingredientes');
const inputsIngredientes = document.getElementsByClassName('ingrediente');

//EVENTOS
document.addEventListener('DOMContentLoaded', ocultarForm());
btnAgregarIngrediente.addEventListener('click', (e) => {
  e.preventDefault;
  agregarIngrediente();
});

//FUNCIONES
function ocultarForm() {
  let alta = document.querySelector('#bloqueAlta');
  let baja = document.querySelector('#bloqueBaja');
  let modificacion = document.querySelector('#bloqueModificar');

  let radioAlta = document.querySelector('#radioAlta');
  let radioBaja = document.querySelector('#radioBaja');
  let radioModificar = document.querySelector('#radioModificar');

  formularioSeleccionado.forEach((bloqueSeleccionado) => {
    bloqueSeleccionado.addEventListener('change', function () {
      if (radioAlta.checked) {
        alta.setAttribute('style', 'display: block');
        baja.setAttribute('style', 'display: none');
        modificacion.setAttribute('style', 'display: none');
      } else if (radioBaja.checked) {
        baja.setAttribute('style', 'display: block');
        modificacion.setAttribute('style', 'display: none');
        alta.setAttribute('style', 'display: none');
      } else if (radioModificar.checked) {
        modificacion.setAttribute('style', 'display: block');
        baja.setAttribute('style', 'display: none');
        alta.setAttribute('style', 'display: none');
      }
    });
  });
}

function agregarIngrediente() {
  for (
    let ingredienteActual = 0;
    ingredienteActual < inputsIngredientes.length;
    ingredienteActual++
  ) {
    console.log(ingredienteActual);
    if (ingredienteActual === inputsIngredientes.length) {
      //Crea un nuevo div
      let nuevoDiv = document.createElement('div');
      nuevoDiv.classList.add('contenido-input');

      //Crea un nuevo input
      let nuevoInput = document.createElement('input');
      nuevoInput.type = 'text';
      nuevoInput.id = `ingrediente${inputsIngredientes.length++}`;
      nuevoInput.placeholder = `Ingrediente ${inputsIngredientes.length++}`;
      nuevoInput.classList.add('ingrediente');

      //Agrega el input al nuevo div
      nuevoDiv.appendChild(nuevoInput);

      // Agrega el nuevo div al contenedor externo
      divIngredientes.appendChild(nuevoDiv);
    }
  }
}

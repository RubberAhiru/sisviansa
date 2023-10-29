//VARIABLES
const formularioSeleccionado = document.getElementsByName('TipoFormulario');

//EVENTOS
document.addEventListener('DOMContentLoaded', () => {
  ocultarForm();
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

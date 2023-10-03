let opcionSeleccionada = document.querySelector('#documento');
let formularioSeleccionado = document.getElementsByName('TipoFormulario');

document.addEventListener('DOMContentLoaded', () => {
  validarFormulario();
  ValidarDocumento();
});

function ValidarDocumento() {
  opcionSeleccionada.addEventListener('change', () => {
    let inputCi = document.getElementById('InputCi');
    let inputDni = document.getElementById('InputDni');
    let inputPasaporte = document.getElementById('InputPasaporte');

    if (opcionSeleccionada.value === 'ci') {
      inputDni.style.display = 'none';
      inputPasaporte.style.display = 'none';
      inputCi.style.display = 'inline-block';
    } else if (opcionSeleccionada.value === 'dni') {
      inputCi.style.display = 'none';
      inputPasaporte.style.display = 'none';
      inputDni.style.display = 'inline-block';
    } else if (opcionSeleccionada.value === 'pasaporte') {
      inputCi.style.display = 'none';
      inputPasaporte.style.display = 'inline-block';
      inputDni.style.display = 'none';
    }
  });
}
function validarFormulario() {
  let persona = document.querySelector('#bloquePersona');
  let empresa = document.querySelector('#bloqueEmpresa');
  let radioEmpresa = document.querySelector('#radioEmpresa');

  formularioSeleccionado.forEach((bloqueSeleccionado) => {
    bloqueSeleccionado.addEventListener('change', function () {
      if (radioEmpresa.checked) {
        empresa.setAttribute('style', 'display: block'); //'visibility:visible'
        persona.setAttribute('style', 'display: none');
      } else {
        persona.setAttribute('style', 'display: block');
        empresa.setAttribute('style', 'display: none');
      }
    });
  });
}

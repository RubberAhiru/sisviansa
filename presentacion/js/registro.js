let opcionSeleccionada = document.getElementById('documento');
let formularioSeleccionado = document.getElementsByTagName('tipoFormulario');

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

  for (var i = 0; i < formularioSeleccionado.length; i++) {
    formularioSeleccionado[i].addEventListener('change', function () {
      if (formularioSeleccionado[1].checked) {
        empresa.setAttribute('style', 'display: block'); //'visibility:visible'
        persona.setAttribute('style', 'display: none');
      } else {
        persona.setAttribute('style', 'display: block');
        empresa.setAttribute('style', 'display: none');
      }
    });
  }
}

const opcionSeleccionada = document.querySelector('#documento');
const formularioSeleccionado = document.getElementsByName('TipoFormulario');
const email = document.querySelector('#email');
const inputs = document.querySelectorAll('#formulario input[type="text"]');
const password = document.querySelector('#password');
const reptirPassword = document.querySelector('#password2');

document.addEventListener('DOMContentLoaded', () => {
  validarCliente();
  ValidarDocumento();
});
inputs.forEach((inputActual) => {
  inputActual.addEventListener('input', validarFormulario);
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
function validarCliente() {
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
function validarEmail(email) {
  const regexEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
  const resultado = regexEmail.test(email);
  return resultado;
}

function validarFormulario(event) {
  if (event.target.id === 'email' && !validarEmail(event.target.value)) {
    mostrarAlerta('El email no es valido', event.target.parentElement);
    return;
  }
  if (event.target.value.trim() === '') {
    mostrarAlerta(
      `El campo ${event.target.id} es obligatorio`,
      event.target.parentElement
    );

    return;
  }

  if (password.value != reptirPassword.value) {
    mostrarAlerta(`Las contraseñas no coinciden`, event.target.parentElement);
  }

  limpiarAlerta(event.target.parentElement);
}
function limpiarAlerta(referencia) {
  const alerta = referencia.querySelector('.alerta-error');
  if (alerta) {
    alerta.remove();
  }
}
function mostrarAlerta(mensaje, referencia) {
  //Comprueba si existe la alerta
  limpiarAlerta(referencia);
  //Genera alerta
  const error = document.createElement('P');
  error.textContent = mensaje;
  error.classList.add('alerta-error');
  //Agrega el error al formulario
  referencia.appendChild(error);
}

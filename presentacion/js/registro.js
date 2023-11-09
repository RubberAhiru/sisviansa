//VARIABLES
const formulario = document.querySelector('#formulario');
const opcionSeleccionada = document.querySelector('#documento');
const formularioSeleccionado = document.getElementsByName('TipoFormulario');
const email = document.querySelector('#email');
const inputs = document.querySelectorAll('#formulario input[type="text"]');
const password = document.querySelector('#password');
const repetirPassword = document.querySelector('#password2');
const btnSubmit = document.querySelector('#btnSubmit');
const insertCliente = document.querySelector('#insertCliente');
const inputsEmpresa = document.querySelectorAll('#empresa input[type="text"]');
const inputsPersona = document.querySelectorAll('#persona input[type="text"]');
const inputsPassword = document.querySelectorAll(
  '#formulario input[type="password"]'
);

//EVENTOS
document.addEventListener('DOMContentLoaded', () => {
  validarCliente();
});
inputsPassword.forEach((campo) => {
  campo.addEventListener('input', validarFormulario);
});

inputs.forEach((inputActual) => {
  inputActual.addEventListener('input', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
  inputs.forEach((inputActual) => {
    if (inputActual.value === '' && !inputActual.disabled) {
      mostrarAlerta(`Falta rellenar campos`, e.target.parentElement);
      e.preventDefault();
    }
  });
});

//FUNCIONES
function ValidarDocumento() {
  opcionSeleccionada.addEventListener('change', () => {
    let inputCi = document.getElementById('InputCi');
    let inputDni = document.getElementById('InputDni');
    let inputPasaporte = document.getElementById('InputPasaporte');

    if (opcionSeleccionada.value === 'ci') {
      inputDni.style.display = 'none';
      inputDni.disabled = true;
      inputPasaporte.style.display = 'none';
      inputPasaporte.disabled = true;
      inputCi.disabled = false;
      inputCi.style.display = 'inline-block';
    } else if (opcionSeleccionada.value === 'dni') {
      inputCi.style.display = 'none';
      inputCi.disabled = true;
      inputPasaporte.style.display = 'none';
      inputPasaporte.disabled = true;
      inputDni.disabled = false;
      inputDni.style.display = 'inline-block';
    } else if (opcionSeleccionada.value === 'pasaporte') {
      inputCi.style.display = 'none';
      inputCi.disabled = true;
      inputPasaporte.disabled = false;
      inputPasaporte.style.display = 'inline-block';
      inputDni.style.display = 'none';
      inputDni.disabled = true;
    }
  });
}
function validarCliente() {
  let persona = document.querySelector('#bloquePersona');
  let empresa = document.querySelector('#bloqueEmpresa');
  let radioEmpresa = document.querySelector('#radioEmpresa');
  let radioPersona = document.querySelector('#radioPersona');
  formularioSeleccionado.forEach((bloqueSeleccionado) => {
    bloqueSeleccionado.addEventListener('change', function () {
      if (radioEmpresa.checked) {
        empresa.style.display = 'block';
        persona.style.display = 'none';
        insertCliente.value = 'cliente-empresa';

        // Deshabilitar campos de persona y habilitar campos de empresa
        inputsPersona.forEach((input) => (input.disabled = true));
        inputsEmpresa.forEach((input) => (input.disabled = false));
      } else if (radioPersona.checked) {
        persona.style.display = 'block';
        empresa.style.display = 'none';
        insertCliente.value = 'cliente-persona';

        // Deshabilitar campos de empresa y habilitar campos de persona
        inputsEmpresa.forEach((input) => (input.disabled = true));
        inputsPersona.forEach((input) => (input.disabled = false));
      }
    });
  });

  ValidarDocumento();
}
function validarEmail(email) {
  const regexEmail = /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
  return regexEmail.test(email);
}

function validarCedulaUruguaya(cedula) {
  const expresionRegular = /^\d{6,7}-?\d$/;
  return expresionRegular.test(cedula);
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

  if (password.value != repetirPassword.value) {
    mostrarAlerta(`Las contraseñas no coinciden`, event.target.parentElement);
    return;
  }
  if (
    event.target.id === 'InputCi' &&
    !validarCedulaUruguaya(event.target.value)
  ) {
    mostrarAlerta('La cedula no es valida', event.target.parentElement);
    return;
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

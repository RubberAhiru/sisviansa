////VARIABLES
const ingresar = document.querySelector('#ingresar');
let username;

//EVENTOS

document.addEventListener('DOMContentLoaded', () => {
  fetch('../persistencia/json/usuarioJSON.php')
    .then((response) => response.json())
    .then((jsonUser) => {
      username = jsonUser;

      mostrarUsuario();
    });

  ingresar.addEventListener('click', (e) => {
    e.preventDefault();
    usuarioIncorrecto(username);
    validarLogin();
  });
});

//FUNCIONES

function usuarioIncorrecto(usuario) {
  if (usuario === 'usuario incorrecto') {
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'Usuario y/o contraseña incorrectos',
      showConfirmButton: false,
      timer: 2000,
    });

    console.log('usuario incorrecto');
    return;
  }
}

function validarLogin() {
  const usuario = document.querySelector('#usuario');
  const contrasenia = document.querySelector('#contrasenia');

  if (usuario.value.trim() === '') {
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'El usuario no puede estar vacio',
      showConfirmButton: false,
      timer: 2000,
    });
    console.log('usuario vacio');
    return;
  } else if (contrasenia.value.trim() === '') {
    Swal.fire({
      position: 'center',
      icon: 'error',
      title: 'La contraseña no puede estar vacia',
      showConfirmButton: false,
      timer: 2000,
    });
    return;
  }
}
function guardarUsuario(user) {
  if (user !== null && user !== 'usuario incorrecto') {
    usuario = JSON.stringify(user);

    localStorage.setItem('miUsuario', usuario);

    return;
  }
}
function mostrarUsuario() {
  const nombreUsuario = document.querySelector('#mostrarUsuario');
  const formUsuario = document.querySelector('#formUser');
  let usuarioLocal = JSON.parse(localStorage.getItem('miUsuario'));
  if (usuarioLocal !== null) {
    Swal.fire({
      position: 'center',
      icon: 'success',
      title: 'Logueado con exito!',
      showConfirmButton: false,
      timer: 2000,
    });
    nombreUsuario.innerHTML = usuarioLocal;
    formUsuario.style.display = 'none';
  }
}

//Selector_de_Inicio:
$(document).ready(function () {
  // Función para mostrar el selector
  function mostrarSelector() {
    $('.selec_inicio').css('display', 'block');
  }

  // Función para ocultar el selector
  function ocultarSelector() {
    $('.selec_inicio').css('display', 'none');
  }

  // Cuando se hace clic en el botón con el ID "cerrar"
  $('#cerrar').click(function () {
    ocultarSelector();
  });

  // Cuando se hace clic en el botón "Empleado"
  $('#empleadoButton').click(function () {
    window.location.href = 'login.html';
  });

  setTimeout(mostrarSelector, 2000); // Cuando se inicia la página, mostrar el selector después de 2000 ms (2 segundos)

  $('.logo').click(mostrarSelector); //cuando toque el logo se abre
});

//Menu:
$(document).ready(main);

var contador = 1;

function main() {
  $('.menu').click(function () {
    // $('nav').toggle();

    if (contador == 1) {
      $('nav').animate({
        left: '0',
      });
      contador = 0;
    } else {
      contador = 1;
      $('nav').animate({
        left: '-100%',
      });
    }
  });
}

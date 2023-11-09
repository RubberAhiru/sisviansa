//VARIABLES
const ingresar = document.querySelector('#ingresar');

//EVENTOS
ingresar.addEventListener('click', validarLogin());

//FUNCIONES
function validarLogin() {
  const usuario = document.querySelector('#usuario');
  const contrasenia = document.querySelector('#contrasenia');
  let user = {
    usuario: '',
    contrasenia: '',
  };

  if (usuario.value.trim() === '') {
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'El usuario no puede estar vacio',
      showConfirmButton: false,
      timer: 2000,
    });
  } else if (contrasenia.value.trim() === '') {
    Swal.fire({
      position: 'top-end',
      icon: 'error',
      title: 'La contraseña no puede estar vacia',
      showConfirmButton: false,
      timer: 2000,
    });
  }
  user.usuario = usuario.value;
  user.contrasenia = contrasenia.value;

  Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Logeado con exito!!',
    showConfirmButton: false,
    timer: 2000,
  });

  localStorage.setItem('miUsuario', JSON.stringify(user));
  return;
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

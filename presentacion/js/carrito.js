//VARIABLES
const cantidadCarrito = document.getElementById('cantCarrito');
let articulosCarrito = JSON.parse(localStorage.getItem('miCarrito'));
document.addEventListener('DOMContentLoaded', mostrarCantidad);

//Carrito:
$(document).ready(function () {
  function showPopup() {
    $('.pop-up').addClass('show');
    $('.pop-up-wrap').addClass('show');
  }

  $('#close').click(function () {
    $('.pop-up').removeClass('show');
    $('.pop-up-wrap').removeClass('show');
  });

  $('.btn-abrir').click(showPopup); //cuando toque el carrito se abre
});

//FUNCIONES
function mostrarCantidad() {
  cantidadCarrito.innerText = articulosCarrito.length + 1;
}

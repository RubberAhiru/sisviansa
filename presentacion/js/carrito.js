//VARIABLES
const cantidadCarrito = document.querySelector('#cantCarrito');
const carrito = document.querySelector('#carrito');
let articulosCarrito = JSON.parse(localStorage.getItem('miCarrito'));
document.addEventListener('DOMContentLoaded', () => {
  mostrarCantidad();
  productosCarrito(articulosCarrito);
});

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
  cantidadCarrito.innerText = articulosCarrito.length;
}

function productosCarrito(arrayProductos) {
  const productosHTML = arrayProductos.map(
    (productoActual) => `
    <div class="carrito" >
    <input type="hidden" name="cantidad" class="cantidad" />
                    <button
                      type="button"
                      class="cantidad"
                      label="Quitar una unidad"
                      name='cantidad'
                    >
                      <span> - </span
                      ><!--usas el span para rellenar algo, en este caso el resultado de la cuenta-->
                    </button>
                    <input type="number" "rows="1" class="input-cant" value="1"/>
                    <button
                      type="button"
                      class="cantidad"
                      name='cantidad'
                      label="Agregar una unidad"
                    >
                      <span>+</span>
                    </button>
                    
                    <img src="assets/viandas/${productoActual.imagen}"  class="img-carrito">
                    <label for=""> ${productoActual.nombre}</label>
                    <div class="precio">
                      <span>$${productoActual.precio}</span>
                    </div>
                    <button class="eliminar">x</button>
                    </div>
                    `
  );

  // Unir todas las viandas en una sola cadena
  const contenidoHTML = productosHTML.join(''); // Asignar el contenido HTML al elemento viandas una sola vez
  carrito.innerHTML = contenidoHTML;
}
function modificarCantidad() {}

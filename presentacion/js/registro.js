document.addEventListener('DOMContentLoaded', () => {
  ValidarDocumento();
});
let opcionSeleccionada = document.getElementById('documento');

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

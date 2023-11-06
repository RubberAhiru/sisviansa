//FETCHS

//const URL = '';

//fetch()









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
    $("#cerrar").click(function () {
        ocultarSelector();
    });

    // Cuando se hace clic en el botón "Empleado"
    $("#empleadoButton").click(function () {
        window.location.href = "login.html";
    });

    setTimeout(mostrarSelector, 2000); // Cuando se inicia la página, mostrar el selector después de 2000 ms (2 segundos)

    $(".logo").click(mostrarSelector); //cuando toque el logo se abre
});


//Menu:
$(document).ready(main);

var contador = 1;

function main(){
	$('.menu').click(function(){
		// $('nav').toggle(); 

		if(contador == 1){
			$('nav').animate({
				left: '0'
			});
			contador = 0;
		} else {
			contador = 1;
			$('nav').animate({
				left: '-100%'
			});
		}

	});

};


//FETCHS

const URL = '';

fetch()







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

//Carrito:
$(document).ready(function () {

    function showPopup(){
        $('.pop-up').addClass('show');
        $('.pop-up-wrap').addClass('show');
    }

    $("#close").click(function(){
        $('.pop-up').removeClass('show');
        $('.pop-up-wrap').removeClass('show');
    });

    $(".btn-abrir").click(showPopup); //cuando toque el carrito se abre

    //setTimeout(showPopup, 2000); //lo ejecutaba apensa entraba 

});
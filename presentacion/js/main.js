//FETCHS

const URL = '';

fetch()









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
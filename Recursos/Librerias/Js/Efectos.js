//hace que el menu se mueva por toda la pagina
$(window).scroll(function ()
{
    if ($(this).scrollTop() > 250) {
        $('#menu').addClass("fixed").fadeIn();
    } else {
        $('#menu').removeClass("fixed");

    }

    

});

/**
 * Función para desplazamiento al inicio despacio.
 * @type type
 */
$(document).ready(function(){

	$('#irarriba').click(function(){
		$('body, html').animate({
			scrollTop: '0px'
		}, 600);
	});

});

/**
 * Funcion quer valida solo numeros en los input
 * @param {type} evt
 * @returns {undefined}
 */
function inputNumero(evt){

     var ch =String.fromCharCode(evt.which);
     if(!(/[0-9]/.test(ch))){
         evt.preventDefault();
     }
}

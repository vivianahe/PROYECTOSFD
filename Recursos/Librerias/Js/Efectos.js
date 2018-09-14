  //hace que el menu se mueva por toda la pagina
  $(window).scroll(function()
            {
                if ($(this).scrollTop() > 250){
					 $('#menu').addClass("fixed").fadeIn();
				}
                else {
					$('#menu').removeClass("fixed");
				
				}
    });
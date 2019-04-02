$(function(){

	/*EFEITO DE ROTAÇÃO DO ICONE DO MENU*/
	$(".btn-secondary").click(function(){

		/*CHECA SE JÁ EXISTE A CLASSE 'MENU-IN' ADICIONADA*/
		var menuAberto = $(this).find(".fa-chevron-right").hasClass("menu-in");
		
		if(menuAberto){
			/*REMOVE A CLASSE DE ROTAÇÃO DO ICONE*/
			$(this).find(".fa-chevron-right").removeClass("menu-in");
		} else{
			/*ADICIONA A CLASSE DE ROTAÇÃO DO ICONE*/
			$(this).find(".fa-chevron-right").addClass("menu-in");
		}
	})

	// ATIVA O EKKO LIGHTBOX
	$(document).on('click', '[data-toggle="lightbox"]', function(event) {
	    event.preventDefault();
	    $(this).ekkoLightbox();
	});
	
});
$(function(){
	
	//ATUALIZA A QUANTIDADE NO CARRINHO:
	$('.qntd').change(function(){
		// PEGA A URL ATRAVES DO DATA-URL
		var base_url = $(this).data('url');
		
		qntd = $(this).val();
		id = $(this).attr('name');
		linhaTabela = $(this).closest('tr');
		unitarioTotal = linhaTabela.children('td:eq(3)').children('.unitario_total');
		  
		//INICIA METODO AJAX:
		$.ajax({

			type: "GET",
			url: base_url + 'atualiza_carrinho/' + qntd + '/' + id,
			success: function(resposta)
			{	
			    quebra = resposta.split("|");
				unitarioTotal.text(quebra[0]);
				$('#total').text(quebra[1]);
				$('#total_carrinho').text('(' + quebra[2] + ' itens)');
			}

      	});//FIM METODO AJAX:

	});


	//CONFIGURAÇÃO DE MASCARA PARA TELEFONE
	var TelMaskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	TelOptions = {
		onKeyPress: function(val, e, field, options) {
			field.mask(TelMaskBehavior.apply({}, arguments), options);
		}
	};
	$('.maskTel').mask(TelMaskBehavior, TelOptions);
	// $('.maskCNPJ').mask("00.000.000/0000-00");
	
});

//RECAPTCHA GOOGLE disable/enable submit
function enableBtn(){
    $('#contFormSubmit').attr("disabled", false);
}

//desabilita o campo de submit
$('#contFormSubmit').attr("disabled", true);
// FIM RECAPTCHA GOOGLE disable/enable submit
$(function(){
	
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
	$('.maskCNPJ').mask("00.000.000/0000-00");
	
});

//RECAPTCHA GOOGLE disable/enable submit
function enableBtn(){
    $('#contFormSubmit').attr("disabled", false);
}

//desabilita o campo de submit
$('#contFormSubmit').attr("disabled", true);
// FIM RECAPTCHA GOOGLE disable/enable submit


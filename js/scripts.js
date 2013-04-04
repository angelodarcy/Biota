/**
 * @author Angelo
 */
$(document).ready(function(){
		$("#usuario").click(function(event){
	  		event.preventDefault();
	  		if ($(this).val() == 'Usuário'){
	  			$(this).val('');
	  		}
			
		});
		$("#senha").click(function(event){
	  		event.preventDefault();
	  		if ($(this).val() == 'Senha'){
				$(this).val('');
			}
		});
		$("#botao").click(function(event){
	  		event.preventDefault();
			if ($('#usuario').val() == '' || $('#usuario').val() == 'Usuário'){
				$('#mensagem').html('Usuário Inválido!');	
				$('#mensagem').slideDown('100');
				
			}else if ($('#senha').val() == '' || $('#senha').val() == 'Senha'){
				$('#mensagem').html('Senha Inválida!');	
				$('#mensagem').slideDown('100');
				
			}else{	
				$.post('valida.php',{
					usuario:$('#usuario').val(), senha: $('#senha').val()
			}, function(data) {
							if (data=='ok'){
								//$.post('principal.php',{
									//				usuario:usuario, senha: usuario
								//});
									
								window.location.replace("principal.php");
								//location.href="principal.php";
							}else{
								$('#mensagem').html('Login ou Senha Inválida!');	
								$('#mensagem').slideDown('100');
								}
 						 
					});
		
					
						
					};
						
					
		});
		
		
		$("#mensagem").click(function(event){
	  		event.preventDefault();
	  		$('#mensagem').slideUp('100');
		});
		$("#nascimento").datepicker({
	  		dateFormat: 'dd/mm/yy',
    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
    nextText: 'Próximo',
    prevText: 'Anterior',
    changeMonth: true,
      changeYear: true
	  	});
	  	$(function() {
    $( document ).tooltip();
  });
});


   	

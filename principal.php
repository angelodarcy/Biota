<?php
	session_start();
	include("parametros.php");
	$usuario = $_POST['usuario'];
		if(!isset($_SESSION['loggedin']))
	{
	   header ("location: index.php");	   
	}
?>
<!DOCTYPE html>

<html>
	
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Biota-MS</title>
		<meta name="author" content="Angelo" />
		<!-- Date: 2013-01-15 -->
		 
		 <!-- Estilos-->
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<link rel="stylesheet" type = "text/css" href = "css/960.css" />
		<link rel="stylesheet" type = "text/css" href="css/reset.css" />
		<link rel="stylesheet" type = "text/css" href="css/text.css" />
		<link rel="stylesheet" type = "text/css" href="js/jquery.autocomplete.css"/>
		<link rel="stylesheet" type = "text/css" href="jqueryUi/css/cupertino/jquery-ui-1.9.2.custom.css">
		
		<!--Scripts em javascript-->
		<script src="jqueryUi/js/jquery-1.8.3.js"></script>
		<script src="jqueryUi/js/jquery-ui-1.9.2.custom.js"></script>
		<script src="js/scripts.js" type="text/javascript" ></script>
		<script src="js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="js/jquery.autocomplete.js" type ="text/javascript"></script>
		
		<style>
			ul.auto-complete-list {
		    list-style-type: none;
		    margin: 0;
		    padding: 0;
		    position: absolute;
		    z-index: 1500;
		    max-height: 250px;
		    overflow: auto;
		}
		
		.icon{
				width: 16px; 
				height: 16px; 
				}
				
		</style>
		
		
		<script type="text/javascript">
		
		$(document).ready(function(){
			 var cont = 0;
			//Criar as abas dos projetos
			$( "#tabs" ).tabs();
			
			
			$( "#accordion" ).accordion();
			
			//Caixa de dialogo para o cadastro de novo projeto
			$("#dialog").dialog({
				autoOpen: false,
				resizable: false,
				height: 500,
      			width: 570,
				show: {
					effect: "blind",
					duration: 100,
					
				},
				
				hide: {
					effect : "blind",
					duration: 100
				}
			});
			
			//Botão de novo projeto acionado
			$( "#novo_projeto").click(function(){
				$("#dialog").dialog("open")
			});
			$( "#pessoas" ).autocomplete("completar.php",{
					selectFirst: true
			});
			
			//Ao clicar o botão de adicionar novas pesssoas no novo projeto
			$("#botao_adicionar").click(function(event){
				//Valida o nome incluso no campo
				$.post('valida_nome.php',{
					pessoa:$('#pessoas').val()
				}, function(data) {
							if (data=='ok'){
								cont = 0;
								$("div.novo").each(function() {
			    				 if ($(this).text() == $('#pessoas').val()){
			    				 	cont = 1;
			    					 } 
								});
								if ($('#pessoas').val() != ''){
								//alert(cont);
								if (cont == 0){
									$('#Adicionar_Pessoas').append("<div class ='botao_lixo' id = "+$('#pessoas').val()+"> <a href=#><span class='ui-icon ui-icon-trash'></span></a> </div>");
									$('#Adicionar_Pessoas').append("<div class='novo'>"+$('#pessoas').val()+"</div>");
									$('#Adicionar_Pessoas').append("<div> &nbsp;</div>");
									$('#Adicionar_Pessoas').slideDown('');
									$('#pessoas').val('');
								}
							else {
								if (cont == 1){
									alert('Já consta cadastrado no Projeto');
									$('#pessoas').val('');
									}
								}
							}
							}else{
								cont = 2;
								}
 						 
					});
					
					
					
			});	
			
			
			$("#cadastrar_novo_projeto").click(function(event){
				
				$("div.novo").each(function() {
					$.post('valida_nome.php'},{ 
						$(this).text()
							});
    				//alert($(this).text());    //Prints out the text contained in this DIV
					});
				});	
		})
		</script>

	
	</head>
	<body>
		
		<div class="container_16">
			<div id="cabecalho">
				<a href="http://www.biota.ms.gov.br" target="_blank"><img src="imagens/biota_448.jpeg" border="0"></a>	 
				Sistema de Cadastro de Biodiversidade do Estado de Mato Grosso do Sul		
			</div>
		
			<div id="arte">
			
			</div>
			
			<div class="spacer">&nbsp;</div>
		</div>
		<div class="container_16">
			<!-- Tabs -->
				<div id="tabs">
					<ul>
						<li><a href="#tabs-1">Projetos</a></li>
						<li><a href="#tabs-2">Coleta de Dados</a></li>
						<li><a href="#tabs-3">Coleção de Dados</a></li>
						<li><a href="#tabs-4">Visualizar os Dados</a></li>
					</ul>
					<div id="tabs-1">
							<div id="projetos" align="left"   >
								<div id="accordion">
									<?php
									$sql = "select * from pessoas_projetos where pessoa_id = ".$_SESSION['ID'];
								
									$result = pg_query($conexao,$sql);
									while ($row = pg_fetch_assoc($result)){
										
										$sql2 = "select * from projetos where id =".$row['projeto_id'];
										$result2 = pg_query($conexao,$sql2);
										$row2 = pg_fetch_assoc($result2);
										echo ("<h3> ".$row2['nome']."</h3>");
										echo ("<div> <p> ".$row2['resumo']."</p> </div> ");
									}
									?>
								
									</div>
							</div>
							<div id="novo_projeto">
								<a href="#" >Novo Projeto</a>
							</div>
							
					</div>
					<form id = "form1" nome = "form1" method = "post" action="">
					<div id="dialog" title="Novo Projeto">
  								<p><label> Nome do Projeto: </label> <textarea rows="2" cols="55" maxlength = "200" name="include_projeto" class="text ui-widget-content ui-corner-all"> </textarea></p>
  								<p><label> Descrição do projeto: </label>
  									<textarea rows="5" cols="55" maxlength = "500" class="text ui-widget-content ui-corner-all" maxlength= "300">	 
									</textarea>
								</p>
								<p>
									<div id = "add_pessoas">
										<div id="div_icons" class="icon">
												<button class="ui-state-default ui-corner-all" title="Adicionar" id = "botao_adicionar">
													<span class="ui-icon ui-icon-plus"></span>
												</button>
											</div>
											<div id = "pessoas_icon">
												<p><label> Adicionar Pessoas no Projeto:</label>
												<input id = "pessoas" class="text ui-widget-content ui-corner-all" size="28" > </input></p>
											</div>
									</div>
								</p>
										<div id = "Adicionar_Pessoas">
											
										</div>
								<p>  &nbsp; </p>
								<p> <button id = "cadastrar_novo_projeto"> Cadastrar</button></p>	
							</div>
						
						
						
					</form>
					<div class="container_16">
					<div id="tabs-2">
							<div id="cadastro">
								<div class="grid_2 alpha" id="input-projeto" align="right">
										Projeto:
								</div>
								<div class="grid_12 alpha" align="left">
									<select>
  										<option value="volvo">Projeto Pessoal</option>
  										<option value="saab">Biota-MS</option>
  										<option value="mercedes">Unidades de Conservação</option>
  									</select>
		

								</div>
			
								<div class="grid_2 alpha" id="input-especie" align="right">
										Especie:
								</div>
								<div class="grid_12 alpha" align="left">
									<input id="especie" name="especie" type="text" value=" " class="required"/>

								</div>
								<div class="grid_2 alpha" align="right">
										Sexo:
								</div>
								<div class="grid_12 alpha" align="left">
									<input id="sexo" name="sexo" type="text" value=" "/>

								</div>
							</div>
					</div>
					
					</div>
					<div id="tabs-3">
							Nam dui erat, auctor a, dignissim quis, sollicitudin eu, felis. Pellentesque nisi urna, interdum eget, sagittis et, consequat vestibulum, lacus. Mauris porttitor ullamcorper augue.
					</div>
					<div id="tabs-4">
							<div class="container_16" >
								<div class="grid_2 alpha" >
								testando
								</div>
								<div class="grid_13 omega" id="testando">
								
								</div>
								
							</div>
					</div>
				</div>
				
			
		</div>
		<div class="container_16">
			<div class="spacer">&nbsp;</div>
			<div align = "right"><a  href="sair.php">Sair</a></div>
		</div>
		<div class="container_16">
			<div class="spacer">&nbsp;</div>
			
		</div>
		
	</body>
</html>


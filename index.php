<?php
	session_start();
	
	include("parametros.php");
	
	?>
<!DOCTYPE html>
<html>
<head>
	
<meta charset=utf-8 />


<link rel="stylesheet" type="text/css" href="css/estilo.css" /> 
    
	
	<script src="jqueryUi/js/jquery-1.8.3.js"></script>
	<script src="js/scripts.js" type="text/javascript"></script>
	
	
	<title>BIOTA-MS</title>
	
</head>
  
<body>
	
 
  
  <div id = "mensagem">
    Mensagem de Erro 
  </div><!--Fecha div mensagem-->
  <div id ="titulo">
  	<tr>
  		<td>
  	<div id="logo">
  		 <a href="http://www.biota.ms.gov.br" target="_blank"><img src="imagens/biota_448.jpeg" border="0"></a> 
  	</div>
  	</td>
  	</tr>
  </div><!--Fecha div titulo-->
  <form id="formlogin" name="formlogin"  action="principal.php" method="post">
  <div id="login-box"> 
    <div id="login-box-interno">
      <div id="login-box-label">
        Login
      </div><!--Fecha div login-box-label-->
      <div class="input-div" id="input-usuario">
        <input id="usuario" name= "usuario" type="text" value="Usuário"/>
      </div><!--Fecha div input-usuario-->
      <div class="input-div" id="input-senha">
        <input id="senha" name="senha" type="password" value="Senha"/>
      </div><!--Fecha div input-senha-->
      <div id="botoes">
      		<div id="botao">
        		Login 
        		
      		</div><!--Fecha div botao-->
      		<div id="esqueceu">
      				<a href="esqueceu_senha.php" target="_blank">Esqueceu a senha</a>
      		</div>
      		
      
    </div><!--Fecha div botoes-->
    
    </div><!--Fecha div login-box-interno-->
  </div><!--Fecha div login-box-->
  </form>
  <div id="novo_usuario">
  	<a href="novo_usuario.php">Novo Usuário</a>
  </div>
</body>
</html>

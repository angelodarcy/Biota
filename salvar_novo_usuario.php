<?php
    session_start();
	include("parametros.php");
	$nome = $_POST['nome'];
	
	$sql = "select * from pessoas where email = '".$_POST["email"]."'";
	$result = pg_query($conexao,$sql);
	
	if (pg_num_rows($result)>0){
		header("location : novo_usuario.php");
	}else{
    $sql = "insert into pessoas (nome,email,senha, cidade_id, estado_id, tipo_de_acesso_id) values ('".$_POST["nome"]."','".$_POST["email"]."','".$_POST["senha"]."',1,1,1)";
	//echo($sql);
	$result = pg_query($conexao, $sql);
 	if (!$result) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	$data=date("Y/m/d");
	$sql = "insert into projetos (nome, resumo, data_de_inicio) values ('Projeto Pessoal','Projeto para cadastro inicial de informações, Este projeto é criado como padrão para todos os usuarios, onde é possível compartilhar informações ou deixa-las de forma privada.','".$data."')";
	$result = pg_query($conexao, $sql);
	if (!$result) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	
 	
	$sql = "select id from projetos order by id desc limit 1";
	$result = pg_query($conexao,$sql);
	$id_projeto = pg_fetch_assoc($result);
	
	$sql = "select id from pessoas where nome = '".$_POST["nome"]."' and email = '".$_POST["email"]."'";
	$result = pg_query($conexao,$sql);
	$id_pessoa = pg_fetch_assoc($result);
	if (!$id_pessoa || !$id_projeto) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	
	$sql = "insert into pessoas_projetos (projeto_id, pessoa_id,coordenador) values('".$id_projeto[id]."','".$id_pessoa[id]."',true)";
	$insert = pg_query($conexao,$sql);
	if (!$insert) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	
	$sql = "insert into projetos (nome, resumo, data_de_inicio) values ('Dados Públicos','Este projeto destinasse a todos os dados dos quais gostaria que fosse disponibilizados á todos os publicos.','".$data."')";
	$result = pg_query($conexao, $sql);
	if (!$result) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	
	$sql = "select id from projetos order by id desc limit 1";
	$result = pg_query($conexao,$sql);
	$id_projeto = pg_fetch_assoc($result);
	
	$sql = "select id from pessoas where nome = '".$_POST["nome"]."' and email = '".$_POST["email"]."'";
	$result = pg_query($conexao,$sql);
	$id_pessoa = pg_fetch_assoc($result);
	if (!$id_pessoa || !$id_projeto) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	
	$sql = "insert into pessoas_projetos (projeto_id, pessoa_id,coordenador) values('".$id_projeto[id]."','".$id_pessoa[id]."',true)";
	$insert = pg_query($conexao,$sql);
	if (!$insert) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	
	header ("location: index.php");
	}
?>
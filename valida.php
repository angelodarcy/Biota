<?php
session_start();
	include("parametros.php");
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	$sql = "select * from pessoas where email = '".$usuario."' and senha = '".$senha."'";
	$result = pg_query($conexao, $sql);
 	if (!$result) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	if (pg_fetch_assoc($result) == 0){
		echo 'erro';
	}else{
		    $parametro = pg_query($conexao,"select * from pessoas where email = '".$usuario."' and senha = '".$senha."'");
			$row = pg_fetch_assoc($parametro);
			$_SESSION['ID'] = $row['id'];
        	$_SESSION['loggedin'] = "YES";
        echo 'ok';}
?>
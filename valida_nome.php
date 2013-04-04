<?php
session_start();
	include("parametros.php");
	$pessoa = $_POST['pessoa'];

	$sql = "select * from pessoas where nome = '".$pessoa."'";
	$result = pg_query($conexao, $sql);
 	if (!$result) {
    	 die("Error in SQL query: " . pg_last_error());
 	}
	if (pg_fetch_assoc($result) == 0){
		echo 'erro';
	}else{
        echo 'ok';}
?>
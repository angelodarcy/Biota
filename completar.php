<?php
include("parametros.php");

$q=strtolower($_GET["q"]);

$sql = "SELECT id,nome FROM pessoas WHERE nome ilike('%$q%')";

$query = pg_query($sql);

while($reg=pg_fetch_array($query)){

	//if (srtpos(strtolower($reg['nome']),$q) !== false){
		
		echo $reg["nome"]. "|" .$reg["nome"];
		echo $reg["id"]. "|" .$reg["id"]. "\n";
	//}
}
?>
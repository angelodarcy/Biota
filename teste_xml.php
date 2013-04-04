<?php
 
// Carrega o arquivo XML, que pode ser local ou remoto. Neste caso, remoto de uma API pública
//$xml = simplexml_load_file("http://ws.audioscrobbler.com/1.0/user/vedovelli/topartists.xml?type=overall");
$teste = 'Platalea';
$xml = simplexml_load_file("http://www.catalogueoflife.org/annual-checklist/2012/webservice?name=$teste+leucorodia&response=full");
 
 
// Cria as HTML tags iniciais da página
echo <<<EOD
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>VEDOVELLI - Last.fm</title>
		</head>
		<body>
EOD;
 
// Faz um loop no arquivo XML criando as variáveis que
// representarão os dados no HTML logo mais abaixo
 
	$reino = $xml->result->classification[0]->taxon[0]->name;
	$filo = $xml->result->classification[0]->taxon[1]->name;
	$classe = $xml->result->classification[0]->taxon[2]->name;
	$ordem = $xml->result->classification[0]->taxon[3]->name;
	$familia = $xml->result->classification[0]->taxon[4]->name;
	$genero = $xml->result->classification[0]->taxon[5]->name;
 
        // Monta o HTML com os dados do XML
	echo "<div style='font-family: tahoma; font-size: 11px; width: 680px; height: 600px; float: left; text-align: center'> <br>";
	
	echo "<br>Reino: '$reino'\n </br>";
	echo "Filo: '$filo'\n";
	echo "Classe: '$classe'\n";
	echo "Ordem: '$ordem'\n";
	echo "Familia: '$familia'\n";
	echo "Genero: '$genero'\n";
	
	
    	//echo "Play count: $playcount<br />\n";
    	echo "<br /></div>";


//echo $xml->artist[i]->i;
//echo $xml;


 
// Fecha as tags HTML da página
echo "</body></html>";
?>
<?php
//error_reporting(0);
require_once $_SERVER[DOCUMENT_ROOT].'config.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/geral.php';


$consulta = "";
$start = "0";
$icones = "0";
$codicoes = "1";
$iconini = "";
$comtitulo = true;
$order = "1";
$limit = "1000000";



foreach ($_REQUEST as $nome_campo => $valor) {
	if ($nome_campo == "consulta") {
		$consulta = $valor;
	}
	if ($nome_campo == "order") {
		$order = $valor;
	}
	if ($nome_campo == "offset") {
		$offset = $valor;
		$limit = "limit 20 offset ".$valor;
	}

	if ($nome_campo == "condicoes") {
		
		$codicoes = str_replace("!", "=", $valor);
		$codicoes = str_replace("^", " and ", $codicoes);
		$codicoes = str_replace("~", " like ", $codicoes);
		$codicoes = str_replace("-", " <> ", $codicoes);
		$codicoes = str_replace(".", "'", $codicoes);
		$codicoes = str_replace("||", " or ", $codicoes);
		$codicoes = str_replace("*", ".", $codicoes);
		$codicoes = str_replace("@", "%", $codicoes);
	}

};
 
//$consulta = $consulta;
//echo $consulta;
//exit;
$generico=new Geral(); 
require_once $_SERVER[DOCUMENT_ROOT].'process/data/consultas.php';
$variavel ='$array=$generico->conexao->execute('.$consulta.');';
//echo $variavel;

eval($variavel);



echo $array;

?>


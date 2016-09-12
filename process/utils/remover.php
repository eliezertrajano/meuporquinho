<?php
require_once $_SERVER[DOCUMENT_ROOT].'config.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/geral.php';

$generico = new Geral();
$tabela=$_REQUEST['tabela'];
$id=$_REQUEST['item'];
echo $generico->deletar($tabela, $id);

?>
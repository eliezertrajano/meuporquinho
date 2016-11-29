<?php

require_once $_SERVER[DOCUMENT_ROOT].'config.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/geral.php';

if (!isset($_SESSION)) {
    session_start();
}

$generico = new Geral();
$usuario = $generico->listar("usuario","seq_usuario,nom_usuario","seq_google='".$_POST["Eea"]."' and eml_usuario='".$_POST["U3"]."'", "nom_usuario");
 

$_SESSION["hash_MeuPorquinho"]= base64_encode($_POST["Eea"]."#".$usuario[0]["usuario"]["nom_usuario"]."#".$usuario[0]["usuario"]["seq_usuario"]);

echo count($usuario)."#".base64_encode(md5($_SESSION["hash_MeuPorquinho"]));


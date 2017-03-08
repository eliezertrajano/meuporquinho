<?php

require_once $_SERVER[DOCUMENT_ROOT].'config.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/geral.php';

if (!isset($_SESSION)) {
    session_start();
}



$generico = new Geral();
$usuario = $generico->listar("usuario","seq_usuario,nom_usuario,ind_autorizado,img_foto","num_identificacao='".$_POST["Eea"]."'  and eml_usuario='".$_POST["U3"]."'", "nom_usuario");
$max_usuario =$generico->listar("usuario","id","1=1","id desc");

$_SESSION["usuario"] = $usuario;

$_SESSION["hash_MeuPorquinho"]= base64_encode($_POST["Eea"]."#".$usuario[0]["usuario"]["nom_usuario"]."#".$usuario[0]["usuario"]["seq_usuario"]);

if(count($usuario)==0){
  $data = array(
      'eml_usuario'=>$_POST["U3"],
      'ind_autorizado'=>'N',
      'num_identificacao'=> $_POST["Eea"],
      'nom_usuario'=> $_POST["ig"],
      'img_foto'=> $_POST["Paa"],
      'tip_identificacao'=>'G',
      'seq_usuario' =>($max_usuario[0]["usuario"]["id"]+1)
  );
   $generico->insert($data,"usuario");
   echo "0#I";
   exit;
}else{
  
  if($usuario[0]["usuario"]["ind_autorizado"]=="N"){
     echo "0#NA";
     exit;
  }else{
    echo count($usuario)."#".base64_encode(md5($_SESSION["hash_MeuPorquinho"]));
    exit;
  }
  
}





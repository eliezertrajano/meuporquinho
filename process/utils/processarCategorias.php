<?php
require_once $_SERVER[DOCUMENT_ROOT].'config.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/mysql.php';
require_once $_SERVER[DOCUMENT_ROOT].'process/data/geral.php';


if (!isset($_SESSION)) {
  session_start();
}
  $generico = new Geral();

 //zerando todos os registros
  $data = array (
			    'seq_categoria'=> '0'
		    );

	$generico->updatedir($data,"lancamento", "seq_usuario=".$_SESSION["id_usuario"]." and tip_origem <> 'MAN'");

 //Incluindo Nova categorizaçao

  $itens = $generico->listar("regra","des_regra,seq_categoria","seq_usuario=".$_SESSION["seq_usuario"], "des_regra");

  foreach($itens as $key ){
        $data = array (
			    'seq_categoria'=> $key["regra"]["seq_categoria"]
		    );
		echo "upper(txt_lancamento) like upper('%".$key["regra"]["des_regra"]."%') and seq_usuario=".$_SESSION["seq_usuario"]." and tip_origem <> 'MAN'";
	     $generico->updatedir($data,"lancamento", "upper(txt_lancamento) like upper('%".$key["regra"]["des_regra"]."%') and seq_usuario=".$_SESSION["seq_usuario"]." and tip_origem <> 'MAN'");
	}

/*
$itens = $generico->listar("tipo_tarefas","id,tipo","1=1", "tipo");


 foreach($itens as $key ){
       $data = array (
			  'tipo'=> $key["tipo_tarefas"]["tipo"]
	    	);
	 
	 echo var_dump($data);
	     $generico->updatedir($data,"tarefas", "id ='".$key["tipo_tarefas"]["id"]."'");
	}
	
	*/
	



?>
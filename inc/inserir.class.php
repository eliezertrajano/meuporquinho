<?php 
 require_once "conexao.class.php";  
 require_once "crud.class.php"; 

 
// Atribui uma conexão PDO   
$pdo = Conexao::getInstance();  


$id="";
$tabela="";
 
if (isset($_POST['tabela'])) {
     $tabela = $_POST['tabela'];
     // Atribui uma instância da classe Crud, passando como parâmetro a conexão PDO e o nome da tabela  
     $crud = Crud::getInstance($pdo, $tabela);  

}

if (isset($_POST['id'])) {
    $id = $_POST['id'];
	
}

$comando= '$data = array(';
				foreach($_POST as $nome_campo => $valor){	   
							if ($nome_campo <> "PHPSESSID" &&  $nome_campo <> "tabela" && $nome_campo <> "__utma" && $nome_campo <> "__utmz" && $nome_campo <>"__utmb" && $nome_campo <>"__utmc" && $nome_campo <> "__utmt"){
								 $comando = $comando. "'".$nome_campo . "'=>'" . $valor . "',";		
				}		   
	    };
$comando=$comando. ');';	
$comando=str_replace("',)", "')", $comando);
eval($comando);	


	
if($id<>""){
	   if(preg_match('/_/',$id)){
			 	 echo $crud->insert($data);  
         
		 }else{
		 		$arrayCond = array('id=' => 1);  
                echo $crud->update($data, $arrayCond);  
		 }
}else{


      $arrayCond = array('id=' => 1);  
      echo $crud->update($data, $arrayCond);  
}

























 $retorno   = $crud->insert($arrayUser);  
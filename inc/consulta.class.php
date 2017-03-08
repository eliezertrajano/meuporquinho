<?php 
 require_once "conexao.class.php";  
 require_once "crud.class.php"; 

  // Consumindo métodos do CRUD genérico 
 
 // Atribui uma conexão PDO   
 $pdo = Conexao::getInstance();  
 

 // Consulta os dados do usuário com id 1 e privilegio A 

 eval("$sql = SELECIONAR_LANCAMENTOS; ");

 $arrayParam = array(1, 'A');  
 $dados      = $crud->getSQLGeneric($sql, $arrayParam, FALSE);  
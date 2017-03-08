<?php 
 require_once "conexao.class.php";  
 require_once "crud.class.php"; 

 
 // Atribui uma conexão PDO   
 $pdo = Conexao::getInstance();  
 
 // Atribui uma instância da classe Crud, passando como parâmetro a conexão PDO e o nome da tabela  
 $crud = Crud::getInstance($pdo, 'TAB_USUARIO');  

 // Editar os dados do usuario com id 1 
 $arrayUser = array('nome' => 'João da Silva', 'email' => 'joao@gmail.com.br', 'senha' => base64_encode('654321'), 'privilegio' => 'A');  
 $arrayCond = array('id=' => 1);  
 $retorno   = $crud->update($arrayUser, $arrayCond);  
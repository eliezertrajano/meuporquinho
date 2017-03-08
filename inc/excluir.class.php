<?php 
 require_once "conexao.class.php";  
 require_once "crud.class.php"; 

  // Consumindo métodos do CRUD genérico 
 
 // Atribui uma conexão PDO   
 $pdo = Conexao::getInstance();  
 

if (isset($_POST['tabela'])) {
     $tabela = $_POST['tabela'];
     // Atribui uma instância da classe Crud, passando como parâmetro a conexão PDO e o nome da tabela  
     $crud = Crud::getInstance($pdo, $tabela);  

}


if (isset($_POST['id'])) {
    $id = $_POST['id'];
	
}

 // Exclui o registro do usuário com id 1 
 $arrayCond = array('id=' => $id);  

 $retorno   = $crud->delete($arrayCond);  
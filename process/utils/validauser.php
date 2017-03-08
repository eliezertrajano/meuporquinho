<?php
if (!isset($_SESSION)) {
    session_start();
}

if(isset($_POST["token"])){
  if(base64_decode($_POST["token"])==md5($_SESSION["hash_MeuPorquinho"])){
  $_SESSION["seq_usuario"] = explode("#",base64_decode($_SESSION["hash_MeuPorquinho"]))[2];
}}else{
  header("location: /");
}
 
if(isset($_SESSION["seq_usuario"])){
   header("location: /index.php");
}else{
  header("location: /login.php");
}
  



 


  //$_SESSION["seq_usuario"] ='2';
 // 

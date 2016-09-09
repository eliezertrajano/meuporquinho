<?php
  session_start();
  $_SESSION["usuario"]="teste";
  $_SESSION["id_usuario"] ='2';
  header("location: /meuporquinho/"); 


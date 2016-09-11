<?php
  session_start();
  $_SESSION["usuario"]="teste";
  $_SESSION["seq_usuario"] ='2';
  header("location: /meuporquinho/");

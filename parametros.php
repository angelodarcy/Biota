<?php
     $servidor = "localhost";
     $porta = 5432;
     $bancoDeDados = "BIOTA";
     $user = "postgres";
     $pass = "sysadm";

     $conexao = pg_connect("host=$servidor port=$porta dbname=$bancoDeDados user=$user password=$pass");
     if(!$conexao) {
         die("Não foi possível se conectar ao banco de dados.");
     }
    
?>

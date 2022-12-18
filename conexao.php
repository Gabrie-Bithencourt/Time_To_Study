<?php

        try{
        $banco = new PDO('mysql:host=localhost;dbname=estudos','root','root');

       }catch(Exception $msg){
          
        echo "Erro de conexão --- ".$msg->getMessage();
       }

     

?>
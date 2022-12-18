<?php
include('conexao.php');
include('funcoes.php');
date_default_timezone_set('America/Sao_Paulo');


 // Prioridades de estudo // Revisão //

$revisao = "SELECT * FROM log_estudos";
$sql_revisao = $banco->prepare($revisao);
$sql_revisao->execute();
$revisar = $sql_revisao->fetchAll();


if($revisar != false){
    
    foreach($revisar as $value){
        
        if($value['updated_at'] != ""){

            $nivel = analisaLevel($value['created_at'],$value['updated_at']);
            var_dump($nivel); die;

        }
        
    }



}else{
    echo "erro 2";
     //$materia = nova_materia();  
}




?>
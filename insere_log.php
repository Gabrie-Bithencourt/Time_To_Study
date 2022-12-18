<?php
include('conexao.php');
include('funcoes.php');
date_default_timezone_set('America/Sao_Paulo');

    $busca_registro = "SELECT * FROM log_estudos WHERE idmaterias = ".$_POST['idmateria']."";
    $sql_busca = $banco->prepare($busca_registro);
    $sql_busca->execute();
    $reg = $sql_busca->fetch();
    

if($reg != ""){

    $update_at = new Datetime();
    $update_log = "UPDATE log_estudos SET updated_at = '".$update_at->format('Y-m-d H:i')."'
                   WHERE idlog_estudos = ".$reg['idlog_estudos']."";

    $sql_update_log = $banco->prepare($update_log);

    if($sql_update_log->execute()){
       echo "Log Atualizado com Sucesso";
    }else{
       echo "Erro";
    }

}else{

    $created_at = new Datetime();
    $insere_log = "INSERT INTO log_estudos(idmaterias,quant_estudada,created_at) VALUES(".$_POST['idmateria'].",1,'".$created_at->format('Y-m-d H:i')."')";
    $sql_log = $banco->prepare($insere_log);


    if($sql_log->execute()){
        $muda_status_materia = "UPDATE materias SET status = 1 WHERE idmaterias = ".$_POST['idmateria']."";
        $status = $banco->prepare($muda_status_materia);
        $status->execute();
        echo "Log Inserido";
    }else{
        echo "Erro";
    }
}

?>
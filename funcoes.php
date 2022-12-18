<?php
date_default_timezone_set('America/Sao_Paulo');

function nova_materia(){
    include('conexao.php');
    // Gerando nova materia de estudo //
    $ids = "SELECT count(idmaterias) as 'ids' FROM materias WHERE status = 0 ";
    $pega_ids_materias = $banco->prepare($ids);
    $pega_ids_materias->execute();
    $materias = $pega_ids_materias->fetch();

    $rand = rand(1,$materias['ids']);

    $busca_nova_materia = "SELECT materia FROM materias WHERE idmaterias = ".$rand." LIMIT 1";
    $nova_materia = $banco->prepare($busca_nova_materia);
    $nova_materia->execute();
    $materia = $nova_materia->fetch();

    return $materia;
}




 function analisaLevel($interval,$update){
     $check_nivel = new Datetime($update);
     $start = new Datetime($interval);
     $intervalo = $start->diff($check_nivel);

     return $intervalo->days;
 }


?>
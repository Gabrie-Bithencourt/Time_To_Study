<?php include('conexao.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudos Enem</title>
    <script src="jquery/jquery.js"></script>
</head>
<body style="background-color:gray;">
  
 <center>
   <h1>Crônograma de estudo dos campeões do Enem</h1>
   <h3>Notas Geral: 860p</h3>
   <h3>Redação: 980p</h3>
   <br><br>
 </center><br><br><br>

 <div style="background-color:white;">
    <h2>Algoritmo de Estudos - 2 Temas por dia</h2>
   <h3>Você deve estudar Hoje:</h3>
</div>
    
<div style="width: 100vw;">

            <?php
            $sql_area_conhecimento = $banco->prepare("SELECT * FROM areas_conhecimentos ORDER BY area_conhecimento");
            $sql_area_conhecimento->execute();
            $area_conhecimento = $sql_area_conhecimento->fetchAll();
            

            $sql_diciplina = $banco->prepare("SELECT * FROM diciplinas ORDER BY diciplina");
            $sql_diciplina->execute();
            $diciplinas = $sql_diciplina->fetchAll();

            $sql_materias = $banco->prepare("SELECT idmaterias,materia FROM materias ORDER BY materia");
            $sql_materias->execute();
            $materias_id = $sql_materias->fetchAll();
            ?>

    <div style="background-color:white;">
        <div>
        <h2>Insere Log de Tempo Estudo</h2>
        </div>
        <div>
            <select name="area_conhecimento" id="area_conhecimento">
                <option value="" selected disabled>Área Conhecimento</option>
                <?php
                 foreach($area_conhecimento as $value){
                    echo "<option value='".$value['id']."'>".$value['area_conhecimento']."</option>";
                 }
                ?>
            </select>
            <select name="diciplina" id="diciplina">
                <option value="" selected disabled>Diciplinas</option>
                <?php
                 foreach($diciplinas as $value){
                    echo "<option value='".$value['id']."'>".$value['diciplina']."</option>";
                 }
                ?>
            </select>
            <select name="materia" id="materia">
                <option value="" selected disabled>Materias</option>
                <?php
                 foreach($materias_id as $materia_id){
                    echo "<option value='".$materia_id['idmaterias']."'>".$materia_id['materia']."</option>";
                 }
                ?>
            </select>

            <button id="insere_log" onclick="insere_log()">Salvar Log</button>
        </div>
        <br><br>
    </div>
    <br><br><br>
</div> 
  
</body>
</html>


<script>

        function insere_log(){
            if(document.getElementById('area_conhecimento').value != "" && document.getElementById('diciplina').value != "" && document.getElementById('materia').value != ""){
              let materia = document.getElementById('materia').value;

             $.ajax({
                type: "POST",
                url: "insere_log.php",
                data: {

                      "idmateria": materia,
                },
                success: function (_user){
                    alert (_user);
                }

             });

             

         }else{
            alert("Preencha todos os campos de Log");
         }
    }
           


</script>
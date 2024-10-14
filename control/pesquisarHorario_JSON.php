<?php

    // Esse programa é chamado pelo JSON no front-end

    if (isset($_POST["data"]) && isset($_POST["instrutor"])) {
        $data = $_POST["data"];
        $id_instrutor = $_POST["instrutor"];

        require_once '../model/instrutorDAO.php';
        require_once '../model/aulaPraticaDAO.php';        
        
        $indexDiaSemana = date('w', strtotime($data)); // Retorna um valor de 0-6 (0 = Domingo)

        $resultado = mysqli_fetch_array(pesquisarInstrutorPorID ($id_instrutor))["dias_semana"];
        $dias_semana = str_split($resultado); // Transformando String em Array

        if ( $dias_semana[$indexDiaSemana] != 0 ) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "horarios" => array('07:00', '08:00', '09:00', '10:00', '11:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00')
            );

            $aulasInstrutorData = pesquisarAulaPorInstrutorData($id_instrutor, $data);

            $totalAulasPossiveis = count($registros["horarios"]);
            $totalAulasInstrutorData = mysqli_num_rows($aulasInstrutorData);

            if ($totalAulasInstrutorData == $totalAulasPossiveis){
                // Todas as aulas possíveis estão marcadas
                echo json_encode(['erro' => 'Esse dia está lotado para esse instrutor.']);
            } else {
                // Percorre todos os resultados 
                while ( $row = mysqli_fetch_assoc($aulasInstrutorData) ) {
                    $hora = $row["hora_aula"];

                    // Encontra o índice do horário no array
                    $indice = array_search($hora, $registros["horarios"]);

                    // Verifica se o horário foi encontrado
                    if ($indice !== false) {
                        // Remove o horário do array
                        unset($array[$indice]);
                    }
                }
            }

            // Envia os dados como JSON (uma lista de instrutores)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // instrutor não encontrado
            echo json_encode(['erro' => 'Instrutor não trabalha nesse dia da semana.']);
        }
            
       
    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar horários disponíveis.']);
    }

?>
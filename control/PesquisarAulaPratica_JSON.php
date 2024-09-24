<?php

    // Esse programa é chamado pelo JSON no front-end

    if ( isset($_POST["pesq"])) {
        $pesq = $_POST["pesq"];

        require_once '../model/aulaPraticaDAO.php';              
        
        $resultado = pesquisarAulaPorAluno($pesq);

        if (mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "aulas" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row["id"];
                $cpf_aluno = $row["cpf_aluno"];
                $cpf_instrutor = $row["cpf_instrutor"];
                $placa = $row["placa"];
                $id_processo = $row["id_processo"];
                $status_detran = $row["status_detran"];
                $obrigatoria = $row["obrigatoria"];
                $data = $row["data_aula"];
                $hora = $row["hora"];
                
                
                $registros["aulas"][] = array(
                        "id" => $id,
                        "cpf_aluno" => $cpf_aluno,
                        "cpf_instrutor" => $cpf_instrutor,
                        "placa" => $placa,
                        "id_processo" => $id_processo,
                        "status" => $status_detran,
                        "obrigatoria" => $obrigatoria,
                        "hora" => $hora,
                        "data" => $data

                        );

            }

            // Envia os dados como JSON (uma lista de produtos)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // Produto não encontrado
            echo json_encode(['erro' => 'aula não encontrado.']);
        }
            
       
    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar aulas.']);
    }

?>
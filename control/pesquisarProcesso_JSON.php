<?php

    // Esse programa é chamado pelo JSON no front-end

    if (isset($_POST["pesq"])) {
        $pesq = $_POST["pesq"];

        require_once '../model/processoDAO.php';              
        
        $resultado = pesquisarProcessoPorCPFAluno($pesq);

        if ( mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "processos" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ( $row = mysqli_fetch_assoc($resultado) ) {
                $cpf_aluno = $row["cpf_aluno"];
                $curso = $row["curso"];
                $data_inicio = $row["data_inicio"];
                $id_processo = $row["id_processo"];
                
                
                $registros["processos"][] = array(
                        "cpf_aluno" => $cpf_aluno,
                        "curso" => $curso,
                        "data_inicio" => $data_inicio,
                        "id_processo" => $id_processo
                        );

            }

            // Envia os dados como JSON (uma lista de instrutores)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // instrutor não encontrado
            echo json_encode(['erro' => 'processo não encontrado.']);
        }
            
       
    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar processo.']);
    }

?>
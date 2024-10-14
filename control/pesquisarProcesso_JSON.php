<?php

    // Esse programa é chamado pelo JSON no front-end

    if (isset($_POST["pesq"])) {
        $pesq = $_POST["pesq"];

        require_once '../model/processoDAO.php';
        require_once '../model/cursoDAO.php';              
        
        $resultado = pesquisarProcessoPorCPFAluno($pesq);

        if ( mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "processos" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ( $row = mysqli_fetch_assoc($resultado) ) {
                $id_aluno = $row["id_aluno"];
                $id_curso = $row["id_curso"];
                $data_inicio = $row["data_inicio"];
                $id_processo = $row["id_processo"];
                $desc_curso = pegarDescricaoCurso($id_curso);
                
                
                $registros["processos"][] = array(
                    "id_aluno" => $id_aluno,
                    "id_curso" => $id_curso,
                    "data_inicio" => $data_inicio,
                    "id_processo" => $id_processo,
                    "desc_curso" => $desc_curso
                    );

            }

            // Envia os dados como JSON (uma lista de processos)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // processo não encontrado
            echo json_encode(['erro' => 'Processo não encontrado.']);
        }
            
       
    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar processo.']);
    }

?>
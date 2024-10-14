<?php

    // Esse programa é chamado pelo JSON no front-end

    require_once "../model/processoDAO.php";

    if (isset($_POST["pesq"])) {
        $id_processo = $_POST["pesq"];
        $id_curso = mysqli_fetch_assoc(pesquisarProcessoPorID($id_processo))["id_curso"];

        require_once '../model/instrutorCursoDAO.php';
        require_once '../model/instrutorDAO.php';           
        
        $resultado = pesquisarVinculoPorCurso($id_curso);

        if (mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "vinculos" => array()
            );

            // Percorre todos os resultados e os adiciona ao array
            while ( $row = mysqli_fetch_assoc($resultado) ) {
                $id_instrutor = $row["id_instrutor"];
                $id_curso = $row["id_curso"];
                $id = $row["id"];
                $id_veiculo = $row["id_veiculo"];
                $nome_instrutor = mysqli_fetch_assoc(pesquisarInstrutorPorID($id_instrutor))["nome"];
                
                $registros["vinculos"][] = array(
                    "id_instrutor" => $id_instrutor,
                    "id_curso" => $id_curso,
                    "id" => $id,
                    "id_veiculo" => $id_veiculo,
                    "nome_instrutor" => $nome_instrutor
                );
            }

            // Envia os dados como JSON (uma lista de curso_instrutor)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // Não existem vinculos com esse curso
            echo json_encode(['erro' => 'Esse curso não está vinculado a nenhum instrutor.']);
        }
            
       
    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar Instrutor.']);
    }

?>
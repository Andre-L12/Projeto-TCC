<?php

    // Esse programa é chamado pelo JSON no front-end

    // Pesquisar para calendário
    if (isset($_POST["tipoPesq"]) && isset($_POST["idPessoa"])) {
        $tipoPesq = $_POST["tipoPesq"];
        $idPessoa = $_POST["idPessoa"];

        require_once '../model/aulaPraticaDAO.php';
        
        $resultado = "";
        if ($tipoPesq == "aluno"){
            $resultado = pesquisarAulaPorIDAluno($idPessoa);
        } else {
            $resultado = pesquisarAulaPorIDInstrutor($idPessoa);
        }

        if (mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "aulas" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row["id_aulaPratica"];
                $data = $row["data_aula"];
                $hora = $row["hora_aula"];
                $status_detran = $row["status_detran"];
                $obrigatoria = $row["obrigatoria"];
                $status_aula = $row["status_aula"];
                $id_veiculo = $row["id_veiculo"];
                $id_instrutor = $row["id_instrutor"];
                $id_processo = $row["id_processo"];

                // $categoria = $row["c.categoria"];
                // $nome_intrutor = $row["nome_instrutor"];
                
                $registros["aulas"][] = array(
                        "id" => $id,
                        "data" => $data,
                        "hora" => $hora,
                        "status_detran" => $status_detran,
                        "obrigatoria" => $obrigatoria,
                        "status_aula" => $status_aula,
                        "id_veiculo" => $id_veiculo,
                        "id_instrutor" => $id_instrutor,
                        "id_processo" => $id_processo
                        // "categoria" => $categoria
                        // "nome_instrutor" => $nome_instrutor
                        );

            }

            // Envia os dados como JSON (uma lista de produtos)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // Produto não encontrado
            echo json_encode(['erro' => 'Nenhuma aula encontrada.']);
        }
            
       
    } 
    
    else if (isset($_POST["pesq"])) {
        $pesq = $_POST["pesq"];

        require_once '../model/aulaPraticaDAO.php';

        $resultado = ""; // colocar consulta BD

        if (mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "aulas" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ($row = mysqli_fetch_assoc($resultado)) {
                $id = $row["id_aulaPratica"];
                $data = $row["data_aula"];
                $hora = $row["hora_aula"];
                $status_detran = $row["status_detran"];
                $obrigatoria = $row["obrigatoria"];
                $status_aula = $row["status_aula"];
                $id_veiculo = $row["id_veiculo"];
                $id_instrutor = $row["id_instrutor"];
                $id_processo = $row["id_processo"];

                $registros["aulas"][] = array(
                        "id" => $id,
                        "data" => $data,
                        "hora" => $hora,
                        "status_detran" => $status_detran,
                        "obrigatoria" => $obrigatoria,
                        "status_aula" => $status_aula,
                        "id_veiculo" => $id_veiculo,
                        "id_instrutor" => $id_instrutor,
                        "id_processo" => $id_processo
                        );

            }

            // Envia os dados como JSON (uma lista de produtos)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // Produto não encontrado
            echo json_encode(['erro' => 'Nenhuma aula encontrada.']);
        }


    } 
    
    else {
        echo json_encode(['erro' => 'ERRO ao pesquisar aulas.']);
    }

?>
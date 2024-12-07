<?php

    // Esse programa é chamado pelo JSON no front-end

    // Pesquisar para calendário
    if (isset($_POST["tipoPesq"]) && isset($_POST["idPessoa"])) {
        $tipoPesq = $_POST["tipoPesq"];
        $idPessoa = $_POST["idPessoa"];

        require_once '../model/aulaPraticaDAO.php';
        require_once 'funçoesUteis.php';
        
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

                $categoria = $row["categoria"];
                $nome_instrutor = $row["nome_instrutor"];
                
                $registros["aulas"][] = array(
                        "id" => $id,
                        "data" => $data,
                        "hora" => $hora,
                        "status_detran" => $status_detran,
                        "obrigatoria" => $obrigatoria,
                        "status_aula" => $status_aula,
                        "id_veiculo" => $id_veiculo,
                        "id_instrutor" => $id_instrutor,
                        "id_processo" => $id_processo,
                        
                        "categoria" => $categoria,
                        "nome_instrutor" => $nome_instrutor
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
    
    // Pesquisar para pesquisar-aulaPratica.php
    else if (isset($_POST["tipo"]) && isset($_POST["pesq"])&&($_POST["tipo"]!='5') && ($_POST["pesq"]!='0')) {
    // Esse programa é chamado pelo JSON no front-end
        $pesq = $_POST["pesq"];
        $tipo = $_POST["tipo"];
        
        require_once '../model/aulaPraticaDAO.php';
        require_once 'funçoesUteis.php';
        
        $resultado = pesquisarAula($pesq,$tipo);

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
                $placa = $row["placa"];
                $id_processo = $row["id_processo"];

                if(isset($row["marca"])){$marca = $row["marca"];}
                if(isset($row["modelo"])){$modelo = $row["modelo"];}

                if(isset($row["nome"])){$nome_aluno = $row["nome"];}
                if(isset($row["nome_instrutor"])){$nome_instrutor = $row["nome_instrutor"];}
                
                $registros["aulas"][] = array(
                        "id" => $id,
                        "data" => converterDataParaPadraoBR($data),
                        "hora" => substr($hora, 0, 5),
                        "status_detran" => $status_detran,
                        "obrigatoria" => $obrigatoria,
                        "status_aula" => $status_aula,
                        "placa" => $placa,
                        "id_processo" => $id_processo,

                        "marca" => $marca,
                        "modelo" => $modelo,

                        "nome_aluno" => $nome_aluno,
                        "nome_instrutor" => $nome_instrutor

                        );

            }

            // Envia os dados como JSON (uma lista de produtos)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // Produto não encontrado
            echo json_encode(['erro' => 'aula não encontrado.']);
        }
    }else if (($_POST["tipo"]=='5') && ($_POST["pesq"]=='0')) {
        // Esse programa é chamado pelo JSON no front-end
            $pesq = $_POST["pesq"];
            $tipo = $_POST["tipo"];
            
            require_once '../model/aulaPraticaDAO.php';
            require_once 'funçoesUteis.php';
            
            $resultado = pesquisarAula($pesq,$tipo);
    
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
                    $status_aula = $row["status_aula"];
                    $nome_aluno = $row["nome_aluno"];
                    $nome_instrutor = $row["nome_instrutor"];
                    
                    
                    
                    $registros["aulas"][] = array(
                            "id" => $id,
                            "data" => converterDataParaPadraoBR($data),
                            "hora" => substr($hora, 0, 5),
                            "status_detran" => $status_detran,
                            "status_aula" => $status_aula,

                            "nome_aluno" => $nome_aluno,
                            "nome_instrutor" => $nome_instrutor
    
                            );
    
                }
    
                // Envia os dados como JSON (uma lista de produtos)
                header('Content-Type: application/json');
                echo json_encode($registros);
            } else {
                // Produto não encontrado
                echo json_encode(['erro' => `
                            <div style="padding: 10px; border: 1px solid #007bff; background-color: #e9f5ff; border-radius: 5px; text-align: center;">
                                <h4 style="color: #007bff; font-weight: bold;">✅ Não há aulas pendentes para registro no Detran.</h4>
                            </div><br>`]);
            }  
       
    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar aulas.']);
    }
    
?>
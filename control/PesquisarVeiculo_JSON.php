<?php

    // Esse programa é chamado pelo JSON no front-end

    if (isset($_POST["pesq"])) {
        $pesq = $_POST["pesq"];

        require_once '../model/VeiculoDAO.php';              
        
        $resultado = pesquisarVeiculoPorModelo($pesq);

        if ( mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "veiculos" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ( $row = mysqli_fetch_assoc($resultado) ) {
                $modelo = $row["modelo"];
                $marca = $row["marca"];
                $placa = $row["placa"];
                $adaptado = $row["adaptado"];
                $ano = $row["ano"];
                $sigla_categoria = $row["sigla_categoria"];
                
                $registros["veiculos"][] = array(
                        "marca" => $marca,
                        "modelo" => $modelo,
                        "ano" => $ano,
                        "placa" => $placa,
                        "sigla_categoria" => $sigla_categoria,
                        "adaptado" => $adaptado
                        );

            }

            // Envia os dados como JSON (uma lista de instrutores)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // instrutor não encontrado
            echo json_encode(['erro' => 'instrutor não encontrado.']);
        }
            
       
    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar instrutores.']);
    }

?>
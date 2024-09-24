<?php

    // Esse programa é chamado pelo JSON no front-end

    if (isset($_POST["pesq"])) {
        $pesq = $_POST["pesq"];

        require_once '../model/instrutorDAO.php';              
        
        $resultado = pesquisarInstrutorPorNome($pesq);

        if ( mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "instrutores" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ( $row = mysqli_fetch_assoc($resultado) ) {
                $nome = $row["nome"];
                $cpf = $row["cpf"];
                $sexo = $row["sexo"];
                $matricula = $row["id_instrutor"];
                
                $registros["instrutores"][] = array(
                        "nome" => $nome,
                        "cpf" => $cpf,
                        "sexo" => $sexo,
                        "matricula" => $matricula
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
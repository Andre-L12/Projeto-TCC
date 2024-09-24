<?php

    // Esse programa é chamado pelo JSON no front-end

    if (isset($_POST["pesq"])) {
        $pesq = $_POST["pesq"];

        require_once '../model/AlunoDAO.php';              
        
        $resultado = pesquisarAlunoPorNome($pesq);

        if ( mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "alunos" => array()  
            );

            // Percorre todos os resultados e os adiciona ao array
            while ( $row = mysqli_fetch_assoc($resultado) ) {
                $id = $row["id"];
                $nome = $row["nome"];
                $cpf = $row["cpf"];
                $email = $row["email"];
                $celular = $row["celular"];
                $foto = $row["foto"];
                $imageBase64 = base64_encode($foto);      // Converter a imagem em binário para Base64
                
                $registros["alunos"][] = array(
                        "id" => $id,
                        "nome" => $nome,
                        "cpf" => $cpf,
                        "email" => $email,
                        "celular" => $celular,
                        "foto" => $imageBase64
                        );

            }

            // Envia os dados como JSON (uma lista de produtos)
            header('Content-Type: application/json');
            echo json_encode($registros);
        } else {
            // Produto não encontrado
            echo json_encode(['erro' => 'Aluno não encontrado.']);
        }
            
       
    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar Alunos.']);
    }

?>
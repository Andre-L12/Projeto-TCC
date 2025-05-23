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
                $id = $row["id_aluno"];
                $nome = $row["nome"];
                $cpf = $row["cpf"];
                $email = $row["email"];
                $celular = $row["celular"];
                $foto = $row["foto"];
                $imageBase64 = base64_encode($foto);      // Converter a imagem em binário para Base64
                
                $registros["alunos"][] = array(
                        "id_aluno" => $id,
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
            // Aluno não encontrado
            echo json_encode(['erro' => 'Aluno não encontrado.']);
        }
            
       
    } else if (isset($_POST["pesq_todos"])){
        require_once '../model/AlunoDAO.php';

        $resultado = pesquisarTodosAlunos();

        if (mysqli_num_rows($resultado) > 0) {
            // Cria um array para armazenar todos os resultados
            $registros = array(
                "erro" => "",
                "alunos" => array() 
            );

            // Percorre todos os resultados e os adiciona ao array
            while ( $row = mysqli_fetch_assoc($resultado) ) {
                $id = $row["id_aluno"];
                $nome = $row["nome"];
                $cpf = $row["cpf"];
                // $email = $row["email"];
                // $celular = $row["celular"];
                // $foto = $row["foto"];
                // $imageBase64 = base64_encode($foto);      // Converter a imagem em binário para Base64
                
                $registros["alunos"][] = array(
                        "id_aluno" => $id,
                        "nome" => $nome,
                        "cpf" => $cpf
                        // "email" => $email,
                        // "celular" => $celular,
                        // "foto" => $imageBase64
                        );
            }

            echo json_encode($registros);

        } else {
            // Alunos não encontrados
            echo json_encode(['erro' => 'Alunos não encontrados.']);
        }

    } else {
        echo json_encode(['erro' => 'ERRO ao pesquisar Alunos.']);
    }

?>
<?php
    require "../model/funçõesBD";
    require "../model/conexaoBD.php";
    require "funçoesUteis.php";

    $nome = $_POST["name"];
    $cpf = $_POST["cpf"];
    $sexo = $_POST["sexo"];
    $curso = $_POST["curso"];

    $msg = validarInstrutor($nome, $cpf, $sexo);

    if(empty($msg)){
        //Tratando dados
        $nome = tratarNome($nome);

        //Inserindo dados no banco
        $id = criarInstrutor($nome, $cpf, $sexo);

        //Devolvendo mensagem
        echo json_encode(["status" => "sucesso"]);
    } else {
        echo json_encode(["status" => "erro", "mensagem" => $msg]);
    }
?>
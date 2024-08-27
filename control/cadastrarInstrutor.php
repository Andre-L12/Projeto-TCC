<?php
    require "../model/funcoesBD.php";
    require_once "../model/conexaoBD.php";
    require "funçoesUteis.php";

    $nome = $_POST["nome"];
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
        $retorna = ["status" => false];
    } else {
        $retorna = ["erro" => true, "mensagem" => "<div class='alert alert-danger' role='alert'> $msg"];
    }

    echo json_encode($retorna);
?>